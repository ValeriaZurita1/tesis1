<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//llamado
use App\Http\Requests;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\Desactiv;
use App\Destest;
use App\Respuesta;
use App\DesTestUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Test;

use DB;
use App\TestPreg;
//

class EstContTestController extends Controller
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
        $idTs=$request->get('idTest');
        $test = Test::find($idTs);
        $fecha = date("Y-m-d");
        if($request->idRespuesta){
            $respuesta = Respuesta::find($request->idRespuesta);
            $desTest = Destest::create([
                'nombUsDes' => $request->user()->name . " " .$request->user()->apellido,
                'notaDes' => $respuesta->notaR,
                'fechaDes' => $fecha,
                'descTest' => $idTs
            ]);

            DesTestUser::create([
                'user_id' => $request->user()->id,
                'destest_id' => $desTest->id
            ]);
        } else {
            $desTest = null;
        }
        return view ('Estudiante.ResolvTest.resp',["DesT"=>$desTest, "test" => $test]);
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
    }

    //vocales
    public function verTestA(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Vocales'; $VaT='16'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestE(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Vocales'; $VaT='17'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestI(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
    }

    public function verTestO(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Vocales'; $VaT='19'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Vocales'; $VaT='20'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    //numeros
    public function verTestNU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Numeros'; $VaT='11'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestND(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Numeros'; $VaT='12'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestNT(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Numeros'; $VaT='13'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestNC(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Numeros'; $VaT='14'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestNCC(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Numeros'; $VaT='15'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }
    //familia
    public function verTestABU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Familia'; $VaT='6'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestHER(Request $request,$id)
    {

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Familia'; $VaT='7'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestMA(Request $request,$id)
    {

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Familia'; $VaT='8'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestPA(Request $request,$id)
    {

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Familia'; $VaT='9'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestPRI(Request $request,$id)
    {

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Familia'; $VaT='10'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }
    //ANIMALES
    public function verTestELEF(Request $request,$id)
    {

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Animales'; $VaT='1'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestGall(Request $request,$id)
    {

        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Animales'; $VaT='2'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestGat(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Animales'; $VaT='3'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //         // dd($Resp);
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestPerr(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);
        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Animales'; $VaT='4'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

    public function verTestVac(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;

        $test = Test::where('selecTest', $id)->first();
        if($test){
            $test->load('seccionActiv');
            $testPreg = $test->testPreg->first();
            if($testPreg){
                $testPreg->load('pregunta');
                $testPreg->pregunta->load('respuestas');
            } else {
                $testPreg = null;
            }
        }else {
            $test = null;
            $testPreg = null;
        }
        return view('Estudiante.ResolvTest.index',["test"=>$test, "testPreg" => $testPreg]);

        // $request->user()->authorizeRoles(['user']);

        // $idU=$request->user()->id;
        // $user=DB::table('users as tbU')
        //         ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //         ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //         ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //         ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //         ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbPU.user_id',$idU)
        //         ->get();
        // $idP=$user[0]->idPR;

        // $rol='docent';

        // $userD=DB::table('users as tbU')
        //     ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
        //     ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
        //     ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
        //     ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
        //     ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
        //         ->where('tbP.id',$idP)
        //         ->where('tbR.name',$rol) //para obtener al docente
        //         ->get();

        // $idD=$userD[0]->id;

        // $vA='Animales'; $VaT='5'; $r='no';

        // $act1=DB::table('actividads as tbT')
        //     ->select('tbT.id')
        //         ->where('tbT.descripcion',$vA)
        //         ->get();
        // $idA=$act1[0]->id;

        // $Test=DB::table('tests as tbT')
        //     ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
        //     ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
        //     ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
        //         ->where('tbU.id',$idD)
        //         ->where('tbT.tipoTest',$idA)
        //         ->where('tbT.selecTest',$VaT)
        //         ->get();

        // if(isset($Test[0])){
        //     $idTs=$Test[0]->id;

        //     $Preg=DB::table('preguntas as tbP')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbP.id','tbP.desPreg','tbT.id as idT')
        //         ->where('tbT.id',$idTs)
        //         ->get();

        //     $Resp=DB::table('respuestas as tbR')
        //     ->join('preguntas as tbP', 'tbP.id','=','tbR.idPreg')
        //     ->join('pregunta_test as tbPT', 'tbPT.pregunta_id','=','tbP.id')
        //     ->join('tests as tbT', 'tbT.id','=','tbPT.test_id')
        //     ->select('tbR.id','tbR.descripR','tbR.idPreg as idP')
        //         ->where('tbT.id',$idTs)
        //         ->get();
        //     return view('Estudiante.ResolvTest.index',["Test"=>$Test,"Preg"=>$Preg,"Resp"=>$Resp]);
        // }
        // else{
        //     return view ('errors.502');
        // }
    }

}
