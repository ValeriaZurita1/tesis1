@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/perro.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>El perro es un animal mamífero y cuadrúpedo que fue domesticado hace unos 10.000 años y que,
                        actualmente, convive con el hombre como una mascota. Su nombre científico es Canis lupus familiaris.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="col one-sixth"> --}}

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/Perro1.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Perro Lenguaje de Señas </h4>
                    <p>El perro es un animal mamífero y cuadrúpedo que fue domesticado hace unos 10.000 años y que,
                        actualmente, convive con el hombre como una mascota. Su nombre científico es Canis lupus familiaris.
                    </p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "Perro") }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@stop
