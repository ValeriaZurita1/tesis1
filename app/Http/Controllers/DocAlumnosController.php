<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Nivel;
use App\paralelo;
use App\ParaleloUs;
use App\anio;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CursoFormRequest;
// use App\Http\Requests\UserUpdateFormRequest;


use DB;
// 

class DocAlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $P=DB::table('paralelos as tbU')
            ->select('tbU.id as id')
            ->get();
        $det=paralelo::findOrFail($id);
        $nomb=$det->id;
                $P_Des=paralelo::where('id',$nomb)->first();

        $us=User::findOrFail($request->idUser);
        $us->estado=$request->get('estado');
        $us->save();
        $us->paralelos()->attach($P_Des);
        // return back();
        return redirect()->action('DocAlumnosController@verList', [$id]);

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
        $P=ParaleloUs::findOrFail($id);

        $idP=$P->paralelo_id;

        $usuario=User::findOrFail($P->user_id);

        $usuario->estado='0';

        $usuario->save();
        $P->delete();

        return redirect()->action('DocAlumnosController@verList', [$idP]);
    }

    public function verList(Request $request,$id)
    {
        $request->user()->authorizeRoles(['docent']);
        $parall=paralelo::findOrFail($id);
        $nivel=Nivel::findOrFail($parall->idNivel);
        $anio=anio::findOrFail($id);
        $valor=$id;
        $P=DB::table('paralelos as tbU')
            ->select('tbU.id')
            ->get();
                $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id','LIKE','%'.$id.'%')
                ->get();
                return view ('Docente.Alumnos.index',["valor"=>$valor,"user"=>$user,"parall"=>$parall,"nivel"=>$nivel,"anio"=>$anio]);
            
        
    }

    public function AddEst(Request $request,$id)
    {
        $request->user()->authorizeRoles(['docent']);
        $parall=paralelo::findOrFail($id);
        $nivel=Nivel::findOrFail($parall->idNivel);
        $anio=anio::findOrFail($id);
        $user=DB::table('users as tbU')
            ->select('tbU.id','tbU.name','tbU.apellido','tbU.direccion','tbU.telefono','tbU.celular','tbU.email')
            ->where ('tbU.estado','=','0')
            ->get();
        $valor=$id;
        return view ('Docente.Alumnos.edit',["valor"=>$valor,"user"=>$user,"parall"=>$parall,"nivel"=>$nivel,"anio"=>$anio]);
        
    }
}
