@extends('layouts.user')

<link rel="stylesheet" href="{{asset('css/Actividad.css')}}">

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
                    <a href="{{ url('EstudianteSCH/ControlActividad/numeros/1/info') }}" class="small-box-footer">
                        Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('EstudianteSCH/ControlActividad/numeros/2/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('EstudianteSCH/ControlActividad/numeros/3/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('EstudianteSCH/ControlActividad/numeros/4/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ url('EstudianteSCH/ControlActividad/numeros/5/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
