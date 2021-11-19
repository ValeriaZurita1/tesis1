@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        {{-- <center><img style="height: 250px; width: 450px" src="{{asset('404Error.jpg')}}"></center> --}}

        <div class="row">
            <div class="col-md-6">

                <div class="row ">
                    <img class="imagen" src="{{ asset('/img/resources/Vocals/A.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>La A es la vocal más común en la gran mayoría de lenguas, con notables excepciones como en el caso
                        del francés y del inglés, en los que la más común es la E.</p>
                </div>
            </div>
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Vocals/araña.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Letra A </h4>
                    <p>La A es la vocal más común en la gran mayoría de lenguas, con notables excepciones como en
                        el caso del francés y del inglés, en los que la más común es la E.</p>
                </div>

            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "A") }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>


@stop
