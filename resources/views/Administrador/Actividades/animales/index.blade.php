@extends('layouts.admin')

<link rel="stylesheet" href="{{asset('css/Actividad.css')}}">

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
                    <a href="{{ url('/UnidadSCH/actividades/info', 'Gato') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Perro') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Gallo') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Vaca') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Elefante') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
