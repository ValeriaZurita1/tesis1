@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Familia/abuelo1.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>Los términos abuelo y abuela son los nombres con los que los hijos designan al padre y a la madre de
                        sus padres, y se les llama, respectivamente, abuelo paterno o materno y abuela paterna o materna.
                        Los padres llaman nietos a los hijos de sus hijos.</p>
                </div>
            </div>
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Familia/Abuelo.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Abuelo Lenguaje de Señas </h4>
                    <p>Los términos abuelo y abuela son los nombres con los que los hijos designan al padre y a la madre de
                        sus padres, y se les llama, respectivamente, abuelo paterno o materno y abuela paterna o materna.
                        Los padres llaman nietos a los hijos de sus hijos.</p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "Abuelo")  }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@stop
