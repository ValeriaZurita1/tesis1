@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <img class="imagen" src="{{ asset('/img/resources/Familia/papa1.jpg') }}" alt="">
            </div>
            <div class="row">
                <h4 class="title"> Caracteristicas </h4>
                <p>El padre de familia es la persona de sexo masculino que tiene el poder, la autoridad y la responsabilidad
                    económica de un hogar.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <img class="imagen" src="{{ asset('/img/resources/Familia/Papa.jpg') }}" alt="">
            </div>
            <div class="row">
                <h4 class="title"> Padre Lenguaje de Señas </h4>
                <p>El padre de familia es la persona de sexo masculino que tiene el poder, la autoridad y la responsabilidad
                    económica de un hogar.</p>
            </div>
        </div>

    </div>
    <div class="row button">
        <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
            <a href="{{ url('/UnidadSCH/actividades/clase', 'Papa') }}"><button type="button"
                    class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                    Siguiente</button></a>
        </div>
    </div>
    </div>
@stop
