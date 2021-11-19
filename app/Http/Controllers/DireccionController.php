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

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function infoIndex()
    {
        return view('informacion');
    }

    /* */
    public function infovLA()
    {
        return view('Estudiante.Rompecabezas.vocales.a.info.index');
    }

    public function infovLAv()
    {
        return view('Estudiante.Rompecabezas.vocales.a.clase.index');
    }

    //vE
    public function infovLE()
    {
        return view('Estudiante.Rompecabezas.vocales.e.info.index');
    }

    public function infovLEv()
    {
        return view('Estudiante.Rompecabezas.vocales.e.clase.index');
    }

    //vI
    public function infovLI()
    {
        return view('Estudiante.Rompecabezas.vocales.i.info.index');
    }

    public function infovLIv()
    {
        return view('Estudiante.Rompecabezas.vocales.i.clase.index');
    }
    //vO
    public function infovLO()
    {
        return view('Estudiante.Rompecabezas.vocales.o.info.index');
    }

    public function infovLOv()
    {
        return view('Estudiante.Rompecabezas.vocales.o.clase.index');
    }
    //vU
    public function infovLU()
    {
        return view('Estudiante.Rompecabezas.vocales.u.info.index');
    }

    public function infovLUv()
    {
        return view('Estudiante.Rompecabezas.vocales.u.clase.index');
    }
    /* */
        /*nUMEROS */
    public function infovN1()
    {
        return view('Estudiante.Rompecabezas.numeros.1.info.index');
    }

    public function infovN1v()
    {
        return view('Estudiante.Rompecabezas.numeros.1.clase.index');
    }

    //vE
    public function infovN2()
    {
        return view('Estudiante.Rompecabezas.numeros.2.info.index');
    }

    public function infovN2v()
    {
        return view('Estudiante.Rompecabezas.numeros.2.clase.index');
    }

    //vI
    public function infovN3()
    {
        return view('Estudiante.Rompecabezas.numeros.3.info.index');
    }

    public function infovN3v()
    {
        return view('Estudiante.Rompecabezas.numeros.3.clase.index');
    }
    //vO
    public function infovN4()
    {
        return view('Estudiante.Rompecabezas.numeros.4.info.index');
    }

    public function infovN4v()
    {
        return view('Estudiante.Rompecabezas.numeros.4.clase.index');
    }
    //vU
    public function infovN5()
    {
        return view('Estudiante.Rompecabezas.numeros.5.info.index');
    }

    public function infovN5v()
    {
        return view('Estudiante.Rompecabezas.numeros.5.clase.index');
    }
    /* */
    /*familia */
    public function infovF1()
    {
        return view('Estudiante.Rompecabezas.familia.abuelo.info.index');
    }

    public function infovF1v()
    {
        return view('Estudiante.Rompecabezas.familia.abuelo.clase.index');
    }

    //vE
    public function infovF2()
    {
        return view('Estudiante.Rompecabezas.familia.hermano.info.index');
    }

    public function infovF2v()
    {
        return view('Estudiante.Rompecabezas.familia.hermano.clase.index');
    }

    //vI
    public function infovF3()
    {
        return view('Estudiante.Rompecabezas.familia.mama.info.index');
    }

    public function infovF3v()
    {
        return view('Estudiante.Rompecabezas.familia.mama.clase.index');
    }
    //vO
    public function infovF4()
    {
        return view('Estudiante.Rompecabezas.familia.papa.info.index');
    }

    public function infovF4v()
    {
        return view('Estudiante.Rompecabezas.familia.papa.clase.index');
    }
    //vU
    public function infovF5()
    {
        return view('Estudiante.Rompecabezas.familia.primo.info.index');
    }

    public function infovF5v()
    {
        return view('Estudiante.Rompecabezas.familia.primo.clase.index');
    }
    /* */
    /*Animales */
    public function infovA1()
    {
        return view('Estudiante.Rompecabezas.animales.elef.info.index');
    }

    public function infovA1v()
    {
        return view('Estudiante.Rompecabezas.animales.elef.clase.index');
    }

    //vE
    public function infovA2()
    {
        return view('Estudiante.Rompecabezas.animales.gallo.info.index');
    }

    public function infovA2v()
    {
        return view('Estudiante.Rompecabezas.animales.gallo.clase.index');
    }

    //vI
    public function infovA3()
    {
        return view('Estudiante.Rompecabezas.animales.gato.info.index');
    }

    public function infovA3v()
    {
        return view('Estudiante.Rompecabezas.animales.gato.clase.index');
    }
    //vO
    public function infovA4()
    {
        return view('Estudiante.Rompecabezas.animales.perro.info.index');
    }

    public function infovA4v()
    {
        return view('Estudiante.Rompecabezas.animales.perro.clase.index');
    }
    //vU
    public function infovA5()
    {
        return view('Estudiante.Rompecabezas.animales.vaca.info.index');
    }

    public function infovA5v()
    {
        return view('Estudiante.Rompecabezas.animales.vaca.clase.index');
    }
    /* */

    public function UnidEIndex()
    {
        return view('UnidadEduc');
    }

    public function CursUnidEIndex()
    {
        return view('cursosUnid');
    }

    public function DocentIndex()
    {
        return view('Docentes');
    }
    /*cursos */
    public function InicialIndex()
    {
        return view('inicialD');
    }

    public function JardinIndex()
    {
        return view('jardin');
    }

    public function SegBIndex()
    {
        return view('SegB');
    }
    public function TercBIndex()
    {
        return view('TercB');
    }
    public function CuartBIndex()
    {
        return view('CuartB');
    }
    public function QuinBIndex()
    {
        return view('QuinB');
    }
    public function SextBIndex()
    {
        return view('SextoB');
    }
    /* fin cursos*/

    public function indexAd()
    {
        return view('Administrador.index');
    }

    public function indexAdAct()
    {
        return view('Administrador.Actividades.index');
    }

    //
    public function indexAdVoc()
    {
        return view('Administrador.Actividades.vocales.index');
    }

    public function infoAd($identificador){

        $view = "";
        switch($identificador){
            case "A": $view = 'Administrador.Rompecabezas.vocales.a.info.index';
                break;
            case "E": $view = 'Administrador.Rompecabezas.vocales.e.info.index';
                break;
            case "I": $view = 'Administrador.Rompecabezas.vocales.i.info.index';
                break;
            case "O": $view = 'Administrador.Rompecabezas.vocales.o.info.index';
                break;
            case "U": $view = 'Administrador.Rompecabezas.vocales.u.info.index';
                break;
            case "Numero1": $view = 'Administrador.Rompecabezas.numeros.1.info.index';
                break;
            case "Numero2": $view = 'Administrador.Rompecabezas.numeros.2.info.index';
                break;
            case "Numero3": $view = 'Administrador.Rompecabezas.numeros.3.info.index';
                break;
            case "Numero4": $view = 'Administrador.Rompecabezas.numeros.4.info.index';
                break;
            case "Numero5": $view = 'Administrador.Rompecabezas.numeros.5.info.index';
                break;
            case "Abuelo": $view = 'Administrador.Rompecabezas.familia.abuelo.info.index';
                break;
            case "Mama": $view = 'Administrador.Rompecabezas.familia.mama.info.index';
                break;
            case "Papa": $view = 'Administrador.Rompecabezas.familia.papa.info.index';
                break;
            case "Primo": $view = 'Administrador.Rompecabezas.familia.primo.info.index';
                break;
            case "Hermano": $view = 'Administrador.Rompecabezas.familia.hermano.info.index';
                break;
            case "Elefante": $view = 'Administrador.Rompecabezas.animales.elef.info.index';
                break;
            case "Gallo": $view = 'Administrador.Rompecabezas.animales.gallo.info.index';
                break;
            case "Gato": $view = 'Administrador.Rompecabezas.animales.gato.info.index';
                break;
            case "Perro": $view = 'Administrador.Rompecabezas.animales.perro.info.index';
                break;
            case "Vaca": $view = 'Administrador.Rompecabezas.animales.vaca.info.index';
                break;
        }
        return view($view);
    }

    public function claseAd($identificador){
        $view = "";
        switch($identificador){
            case "A": $view = 'Administrador.Rompecabezas.vocales.a.clase.index';
                break;
            case "E": $view = 'Administrador.Rompecabezas.vocales.e.clase.index';
                break;
            case "I": $view = 'Administrador.Rompecabezas.vocales.i.clase.index';
                break;
            case "O": $view = 'Administrador.Rompecabezas.vocales.o.clase.index';
                break;
            case "U": $view = 'Administrador.Rompecabezas.vocales.u.clase.index';
                break;
            case "Numero1": $view = 'Administrador.Rompecabezas.numeros.1.clase.index';
                break;
            case "Numero2": $view = 'Administrador.Rompecabezas.numeros.2.clase.index';
                break;
            case "Numero3": $view = 'Administrador.Rompecabezas.numeros.3.clase.index';
                break;
            case "Numero4": $view = 'Administrador.Rompecabezas.numeros.4.clase.index';
                break;
            case "Numero5": $view = 'Administrador.Rompecabezas.numeros.5.clase.index';
                break;
            case "Abuelo": $view = 'Administrador.Rompecabezas.familia.abuelo.clase.index';
                break;
            case "Mama": $view = 'Administrador.Rompecabezas.familia.mama.clase.index';
                break;
            case "Papa": $view = 'Administrador.Rompecabezas.familia.papa.clase.index';
                break;
            case "Primo": $view = 'Administrador.Rompecabezas.familia.primo.clase.index';
                break;
            case "Hermano": $view = 'Administrador.Rompecabezas.familia.hermano.clase.index';
                break;
            case "Elefante": $view = 'Administrador.Rompecabezas.animales.elef.clase.index';
                break;
            case "Gallo": $view = 'Administrador.Rompecabezas.animales.gallo.clase.index';
                break;
            case "Gato": $view = 'Administrador.Rompecabezas.animales.gato.clase.index';
                break;
            case "Perro": $view = 'Administrador.Rompecabezas.animales.perro.clase.index';
                break;
            case "Vaca": $view = 'Administrador.Rompecabezas.animales.vaca.clase.index';
                break;
        }
        return view($view);
    }


    public function indexAdNum()
    {
        return view('Administrador.Actividades.numeros.index');
    }

    public function indexAdFam()
    {
        return view('Administrador.Actividades.familia.index');
    }

    public function indexAdAnim()
    {
        return view('Administrador.Actividades.animales.index');
    }
    //

    public function indexDC()
    {
        return view('Docente.index');
    }

    public function indexEs(Request $request)
    {
        //$request->user()->authorizeRoles(['user']);
        $idU=$request->user()->id;
        $user = User::find($idU);
        return view('Estudiante.index',["user"=>$user]);
    }
    //actividads
    public function indexEsAct(Request $request)
    {
        $request->user()->authorizeRoles('user');
        if ($request)
        {
        return view('Estudiante.Actividades.index');
        }
    }

    public function indexEsVoc(Request $request)
    {
        $request->user()->authorizeRoles('user');
        if ($request)
        {
        return view('Estudiante.Actividades.vocales.index');
        }
    }

    public function indexEsNum(Request $request)
    {
        $request->user()->authorizeRoles('user');
        if ($request)
        {
        return view('Estudiante.Actividades.numeros.index');
        }
    }

    public function indexEsFam(Request $request)
    {
        $request->user()->authorizeRoles('user');
        if ($request)
        {
        return view('Estudiante.Actividades.familia.index');
        }
    }

    public function indexEsAnim(Request $request)
    {
        $request->user()->authorizeRoles('user');
        if ($request)
        {
        return view('Estudiante.Actividades.animales.index');
        }
    }
    //finActiv

    public function indexGestor()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('Administrador.index');

        }
        else{
            if(auth()->user()->hasRole('docent')){
                return view('Docente.index');
            }
        }

        return view('Estudiante.index');
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
}
