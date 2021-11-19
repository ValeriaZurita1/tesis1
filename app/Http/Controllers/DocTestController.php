<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\Test;
use App\TestUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\TestFormRequest;


use DB;
//

class DocTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request)
    {

        $request->user()->authorizeRoles('docent');
        $idUS=$request->user()->id;
        if ($request)
        {

            $query=trim($request->get('searchText')); //determinr texto de busqueda


            $test=DB::table('tests as tbU')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbU.id')
            ->join('users as tbT', 'tbT.id','=','tbTU.user_id')
            ->select('tbU.id','tbU.desTest','tbU.tipoTest','tbU.selecTest')

            ->where('tbU.desTest','LIKE','%'.$query.'%')
            ->where('tbT.id',$idUS)


            ->orderBy('tbU.id','asc')

            ->paginate(7);

            return view ('Docente.Test.index',["test"=>$test,"searchText"=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('docent');

        $act=DB::table('actividads as tbU')
            ->select('tbU.id','tbU.descripcion')
            ->get();

        return view ("Docente.Test.create",["act"=>$act]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestFormRequest $request)
    {
        //
        // dd($request->SA);


        $nomb=$request->user()->id;
        $P_Des=User::where('id',$nomb)->first();
        // dd($P_Des);
        $cTest=DB::table('tests as tbU')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbU.id')
            ->join('users as tbT', 'tbT.id','=','tbTU.user_id')
            ->select('tbU.id','tbU.desTest','tbU.tipoTest','tbU.selecTest')

            ->where('tbTU.user_id',$nomb)
            ->where('tbU.selecTest',$request->get('SA'))


            ->get();
            if(isset($cTest[0])){
            	$act=DB::table('actividads as tbU')
            ->select('tbU.id','tbU.descripcion')
            ->get();
            	return view ("Docente.Test.create",["act"=>$act]);
            }
            else{
            	$test=new Test;

        $test->desTest=$request->get('desTest');

        $test->tipoTest=$request->get('tipoTest');

        $test->selecTest=$request->get('SA');

        $test->save();
        //

        $test->users()->attach($P_Des);
        //
        return Redirect::to('DocenteSCH/Test');
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        $request->user()->authorizeRoles(['docent']);
        $test=Test::findOrFail($id);

        return view("Docente.Test.edit",["test"=>$test]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestFormRequest $request, $id)
    {
        //
        $usuario=Test::findOrFail($id);

        $usuario->desTest=$request->get('desTest');

        $usuario->save();

        return Redirect::to('DocenteSCH/Test');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = null;
        try {
            //
            $P_Des=TestUser::where('test_id',$id)->first();
            $idR=$P_Des->id;
        // dd($P_Des);
            $relTes=TestUser::findOrFail($idR);

            $relTes->delete();

            $test=Test::findOrFail($id);

            $test->delete();
        } catch (Throwable $e) {
            $message = "No se puede eliminar el test, por existen registros asociados";
        }

        if($message){
            return Redirect::to('DocenteSCH/Test')->with('warning',$message);
        }else {
            return Redirect::to('DocenteSCH/Test');
        }
    }

    public function verList(Request $request,$id)
    {
        $request->user()->authorizeRoles(['docent']);
        $test=Test::findOrFail($id);
        $idUS=$request->user()->id;
        $valor=$id;
        $preg=DB::table('preguntas as tbP')
            ->join('pregunta_test as tbTU', 'tbTU.pregunta_id','=','tbP.id')
            ->join('tests as tbT', 'tbT.id','=','tbTU.test_id')
            ->join('test_user as tbTxU', 'tbTxU.test_id','=','tbT.id')
            ->join('users as tbUs', 'tbUs.id','=','tbTxU.user_id')
            ->select('tbP.id','tbP.desPreg','tbT.id as idT')
            ->where('tbT.id','LIKE','%'.$id.'%')
            ->where('tbUs.id',$idUS)
            ->get();
        return view ('Docente.Test.Pregunt.index',["valor"=>$valor,"test"=>$test,"preg"=>$preg]);
    }
}
