@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Numeros/cinco.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>En matemáticas un número puede representar una cantidad métrica o más generalmente un elemento de un sistema numérico o un número ordinal que representará una posición dentro de un orden de una serie determinada.</p>
                </div>
            </div>
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Numeros/Ejemplo5.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Número 5 Lenguaje de Señas </h4>
                    <p>En matemáticas un número puede representar una cantidad métrica o más generalmente un elemento de un sistema numérico o un número ordinal que representará una posición dentro de un orden de una serie determinada.</p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "Numero5") }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@stop
