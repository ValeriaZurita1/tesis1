@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/GATO.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>Gato, procedente del vocablo latino cattus, es un término que alude a un animal mamífero que forma
                        parte del conjunto de los félidos: aquellas especies carnívoras que presentan patas posteriores con
                        cuatro dedos y patas anteriores con cinco dedos; uñas retráctiles; hocico corto; y cabeza de forma
                        redondeada. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/Gato1.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Gato Lenguaje de Señas </h4>
                    <p>Gato, procedente del vocablo latino cattus, es un término que alude a un animal mamífero que forma
                        parte del conjunto de los félidos: aquellas especies carnívoras que presentan patas posteriores con
                        cuatro dedos y patas anteriores con cinco dedos; uñas retráctiles; hocico corto; y cabeza de forma
                        redondeada. </p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "Gato") }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@stop
