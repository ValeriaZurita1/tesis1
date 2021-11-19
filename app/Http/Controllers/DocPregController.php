<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Pregunta;
use App\TestPreg;
use App\Test;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PregFormRequest;


use DB;
//

class DocPregController extends Controller
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

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PregFormRequest $request)
    {
        // 
        // dd($request->idTest);
        $idT=$request->idTest;
        // dd($request->desPreg);
        // $nomb=$request->user()->id;
        $P_Des=Test::where('id',$idT)->first();
        // dd($P_Des);

        $preg=new Pregunta;

        $preg->desPreg=$request->get('desPreg');       

        $preg->save();
        //

        $preg->tests()->attach($P_Des);
        //
        // return Redirect::to('UnidadSCH/Test');
        return redirect()->action('DocTestController@verList', [$idT]);
           
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

        $testP=TestPreg::where('pregunta_id',$id)->first();
        $idT=$testP->test_id;
        $test=Test::findOrFail($idT);
        $preg=Pregunta::findOrFail($id);
        
        return view("Docente.Test.Pregunt.edit",["test"=>$test,"preg"=>$preg]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PregFormRequest $request, $id)
    {
        //
        $idT=$request->idTest;

        $usuario=Pregunta::findOrFail($id);

        $usuario->desPreg=$request->get('desPreg');

        $usuario->save();

        // return Redirect::to('UnidadSCH/Test');
        return redirect()->action('DocTestController@verList', [$idT]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $P_Des=TestPreg::where('pregunta_id',$id)->first();
        $idR=$P_Des->id;
        $idT=$P_Des->test_id;
        // dd($P_Des);
        $relTes=TestPreg::findOrFail($idR);

        $relTes->delete();

        $test=Pregunta::findOrFail($id);

        $test->delete();

        // return Redirect::to('UnidadSCH/Test'); 
        return redirect()->action('DocTestController@verList', [$idT]);
    }

    public function verList(Request $request,$id)
    {
        $request->user()->authorizeRoles(['docent']);

        $preg=Pregunta::findOrFail($id);
        $P_Des=TestPreg::where('pregunta_id',$preg->id)->first();
        // $idR=$P_Des->id;
        $idT=$P_Des->test_id;


        $test=Test::findOrFail($idT);
        $valor=$id;
        $resp=DB::table('respuestas as tbRe')
            ->join('preguntas as tbP', 'tbP.id','=','tbRe.idPreg')
            ->join('pregunta_test as tbTU', 'tbTU.pregunta_id','=','tbP.id')
            ->join('tests as tbT', 'tbT.id','=','tbTU.test_id')
            ->select('tbRe.id','tbRe.descripR','tbRe.notaR','tbP.id as idP')
            ->where('tbP.id','LIKE','%'.$id.'%')
            ->get();  
        return view ('Docente.Test.Respuest.index',["valor"=>$valor,"resp"=>$resp,"test"=>$test,"preg"=>$preg]);
    }
}
