<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class EstVerResActController extends Controller
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
    //vOCALES
    public function verRegA(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='A'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Vocales'; $VaT='16';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.vocales.LeTA',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegE(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='E'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Vocales'; $VaT='17';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.vocales.LetE',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegI(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='I'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Vocales'; $VaT='18';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.vocales.LetI',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegO(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='O'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Vocales'; $VaT='19';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.vocales.LetO',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='U'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Vocales'; $VaT='20';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.vocales.LetU',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    //Numeros
    public function verRegNU(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Uno'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Numeros'; $VaT='11';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.numeros.Num1',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegND(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Dos'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Numeros'; $VaT='12';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.numeros.Num2',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegNT(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Tres'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Numeros'; $VaT='13';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.numeros.Num3',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegNC(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Cuatro'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Numeros'; $VaT='14';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.numeros.Num4',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegNCC(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Cinco'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Numeros'; $VaT='15';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.numeros.Num5',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }
    //Familia
    public function verRegAbu(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Abuelo'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Familia'; $VaT='6';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.familia.FamAbu',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegHer(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Hermano'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Familia'; $VaT='7';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.familia.FamHerm',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegMa(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Mamá'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Familia'; $VaT='8';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.familia.FamMama',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegPa(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Papá'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Familia'; $VaT='9';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.familia.FamPapa',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegPri(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Primo'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Familia'; $VaT='10';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.familia.FamPrim',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }
    //Animales
    public function verRegElef(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Elefante'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Animales'; $VaT='1';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.animales.AnimElef',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegGall(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Gallo'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Animales'; $VaT='2';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.animales.AnimGall',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegGat(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Gato'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Animales'; $VaT='3';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.animales.AnimGat',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegPerr(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Perro'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Animales'; $VaT='4';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.animales.AnimPerr',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    }

    public function verRegVac(Request $request,$id)
    {
        $request->user()->authorizeRoles(['user']);
        $Alum=$request->user()->name.' '.$request->user()->apellido;
        $vocal='Vaca'; $idU=$request->user()->id;

        $user=DB::table('users as tbU')
                ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
                ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
                ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
                ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
                ->select('tbU.id','tbPU.id as idR','tbPU.paralelo_id as idPR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbPU.user_id',$idU)
                ->get();
        $idP=$user[0]->idPR; $rol='docent';

        $userD=DB::table('users as tbU')
            ->join('paralelo_user as tbPU', 'tbPU.user_id','=','tbU.id')
            ->join('paralelos as tbP', 'tbP.id','=','tbPU.paralelo_id')
            ->join('role_user as tbRU', 'tbRU.user_id','=','tbU.id')
            ->join('roles as tbR', 'tbR.id','=','tbRU.role_id')
            ->select('tbU.id','tbPU.id as idR','tbU.name as nomb','tbU.apellido as apell','tbU.direccion as direcc','tbU.telefono as telef','tbU.celular as cel','tbU.email as correo','tbR.descripcion as Rol')
                ->where('tbP.id',$idP)
                ->where('tbR.name',$rol) //para obtener al docente
                ->get();
        
        $idD=$userD[0]->id; $vA='Animales'; $VaT='5';

        $act1=DB::table('actividads as tbT')
            ->select('tbT.id')
                ->where('tbT.descripcion',$vA)
                ->get();
        $idA=$act1[0]->id;

        $Test=DB::table('tests as tbT')
            ->join('test_user as tbTU', 'tbTU.test_id','=','tbT.id')
            ->join('users as tbU', 'tbU.id','=','tbTU.user_id')
            ->select('tbT.id','tbT.desTest','tbT.tipoTest','tbT.selecTest')
                ->where('tbU.id',$idD)
                ->where('tbT.tipoTest',$idA)
                ->where('tbT.selecTest',$VaT)
                ->get();
        if(isset($Test[0])){
        $descT=$Test[0]->desTest;
        /*vocal A */
        $VocalA=DB::table('desactivs as D')
        ->join('seccion_activs as SA','D.idSecact','=','SA.id')
        ->select('D.Alumno','D.id','D.tiempo')
        ->where('D.Alumno',$Alum)
        ->where('SA.descripcion',$vocal)
        ->get();

        // dd($VocalA);

        $TestA=DB::table('destests as DT')
        ->select('DT.id','DT.notaDes','DT.descTest','DT.fechaDes','DT.nombUsDes')
        ->where('DT.nombUsDes',$Alum)
        ->where('DT.descTest',$descT)
        ->get();

        return view ('Estudiante.ResActiv.animales.AnimVac',["VocalA"=>$VocalA,"TestA"=>$TestA]);
        }
        else{$TestA=$Test;}  
    } 
}
