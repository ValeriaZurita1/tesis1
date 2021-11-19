@extends('layouts.user')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center"> Vocales </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{ asset('img/vocal.jpg') }}" width="290" height="100" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('/EstudianteSCH/ControlActividad/vocales') }}" class="small-box-footer">Ver <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Números del 1 al 5 </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/numero.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('/EstudianteSCH/ControlActividad/numeros') }}" class="small-box-footer">Ver <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center">Integrantes de la familia</p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/familia.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('/EstudianteSCH/ControlActividad/familia') }}" class="small-box-footer">Ver <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Animales </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/animales/vaca.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('/EstudianteSCH/ControlActividad/animales') }}" class="small-box-footer">Ver
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
