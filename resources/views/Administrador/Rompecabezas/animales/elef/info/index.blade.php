@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/oveja.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>​Es un mamífero cuadrúpedo ungulado doméstico, utilizado como ganado. Como todos los rumiantes, las
                        ovejas son artiodáctilos, o animales con pezuñas.</p>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="col one-sixth"> --}}

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/Oveja1.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Oveja Lenguaje de Señas </h4>
                    <p>Es un mamífero cuadrúpedo ungulado doméstico, utilizado como ganado. Como todos los rumiantes, las
                        ovejas son artiodáctilos, o animales con pezuñas.</p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "Elefante")  }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@stop
