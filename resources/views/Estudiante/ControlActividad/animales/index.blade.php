@extends('layouts.user')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center"> Actividad Gato </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{asset('img/resources/Animales/GATO.jpg')}}" width="290" height="150" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('EstudianteSCH/ControlActividad/animales/gato/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Actividad Perro </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{asset('img/resources/Animales/perro.jpg')}}" width="290" height="150" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/animales/perro/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center">Actividad Pollo</p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{asset('img/resources/Animales/POLLO.jpg')}}" width="290" height="150" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/animales/gallo/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Actividad Vaca </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{asset('img/resources/Animales/VACA.jpg')}}" width="290" height="150" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/animales/vaca/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <p class="text-center"> Oveja </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{asset('img/resources/Animales/oveja.jpg')}}" width="290" height="150" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/animales/elef/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
