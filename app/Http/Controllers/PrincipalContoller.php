<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalContoller extends Controller
{
    //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.index');
        // return view('PaginaPrincipal');
    }

    public function informacion(){
        return view('main.informacion');
    }

    public function unidadEducativa(){
        return view('main.unidad-educativa');
    }

    public function cursos(){
        return view('main.cursos');
    }

    public function loginEstudiante(){
        return view('main.auth.login-estudiante');
    }


}
