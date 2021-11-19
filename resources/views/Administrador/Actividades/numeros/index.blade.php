@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <p class="text-center"> Actividad Número 1 </p>
                </div>
                <div class="panel-body text-center">
                    <img src="{{asset('img/resources/Numeros/uno.jpg')}}" width="290" height="200" />
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ url('/UnidadSCH/actividades/info', 'Numero1') }}" class="small-box-footer">Ver <i
                        class="fa fa-arrow-circle-right"></i></a>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center"> Actividad Número 2 </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{asset('img/resources/Numeros/dos.jpg')}}" width="290" height="200" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Numero2') }}" class="small-box-footer">Ver <i
                            class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center">Actividad Número 3</p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{asset('img/resources/Numeros/tres.jpg')}}" width="290" height="200" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Numero3') }}" class="small-box-footer">Ver <i
                            class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center"> Actividad Número 4 </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{asset('img/resources/Numeros/cuatro.jpg')}}" width="290" height="200" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Numero4') }}" class="small-box-footer">Ver <i
                            class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="panel">
                    <div class="panel-heading text-center">
                        <p class="text-center"> Actividad Número 5 </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{asset('img/resources/Numeros/cinco.jpg')}}" width="290" height="200" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('/UnidadSCH/actividades/info', 'Numero5') }}" class="small-box-footer">Ver <i
                            class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
