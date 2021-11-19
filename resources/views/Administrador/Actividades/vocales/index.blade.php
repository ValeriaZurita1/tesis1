@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center"> Actividad A </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{ asset('img/vocal/a.jpg') }}" width="290" height="100" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('/UnidadSCH/actividades/info', 'A') }}" class="small-box-footer">Ver <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Actividad E </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/e.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('/UnidadSCH/actividades/info', 'E') }}" class="small-box-footer">Ver <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center">Actividad I</p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/i.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('/UnidadSCH/actividades/info', 'I') }}" class="small-box-footer">Ver <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Actividad O </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/o.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url(url('/UnidadSCH/actividades/info', 'O')) }}" class="small-box-footer">Ver
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <p class="text-center"> Actividad U </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/u.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url(url('/UnidadSCH/actividades/info', 'U')) }}" class="small-box-footer">Ver
                                <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
