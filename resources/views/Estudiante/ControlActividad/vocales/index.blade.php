@extends('layouts.user')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading"><p class="text-center"> Actividad A </p></div>
                    <div class="panel-body text-center">
                        <img src="{{ asset('img/vocal/a.jpg') }}" width="290" height="100" />
                    </div>
                    <div class="panel-footer text-center" >
                        <a href="{{ url('EstudianteSCH/ControlActividad/vocales/A/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading"> <p class="text-center"> Actividad E </p> </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/e.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center"><a href="{{ url('EstudianteSCH/ControlActividad/vocales/E/info') }}"
                                class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading"> <p class="text-center">Actividad I</p></div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/i.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/vocales/I/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading"><p class="text-center"> Actividad O </p></div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/o.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/vocales/O/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading text-center"><p class="text-center"> Actividad U </p></div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/vocal/u.jpg') }}" width="290" height="100" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/vocales/U/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
