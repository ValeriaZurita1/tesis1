@extends('layouts.user')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="text-center"> Actividad Mamá </p>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{ asset('img/resources/Familia/mama.png') }}" width="290" height="200" />
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{ url('EstudianteSCH/ControlActividad/familia/mama/info') }}" class="small-box-footer">
                            Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Actividad Papá </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/resources/Familia/papa1.jpg') }}" width="290" height="200" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/familia/papa/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center">Actividad Abuelo</p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/resources/Familia/abuelo1.jpg') }}" width="290" height="200" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/familia/abuelo/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="text-center"> Actividad Hermano </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/resources/Familia/hermano.jpg') }}" width="290" height="200" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/familia/hermano/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <p class="text-center"> Actividad Hijo </p>
                        </div>
                        <div class="panel-body text-center">
                            <img src="{{ asset('img/resources/Familia/hijo1.jpg') }}" width="290" height="200" />
                        </div>
                        <div class="panel-footer text-center">
                            <a href="{{ url('EstudianteSCH/ControlActividad/familia/primo/info') }}" class="small-box-footer">
                                Ver <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
