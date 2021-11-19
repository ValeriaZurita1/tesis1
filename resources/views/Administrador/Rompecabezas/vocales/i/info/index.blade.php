@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')
    <div class="container">
        {{-- <center><img style="height: 250px; width: 450px" src="{{asset('404Error.jpg')}}"></center> --}}
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Vocals/I.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>La letra I es la novena del alfabeto castellano, se encuentra clasificada como una vocal, la etimología de la letra I se remonta en la “iota” griega</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Vocals/Iglesia.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Letra I </h4>
                    <p>La letra I es la novena del alfabeto castellano, se encuentra clasificada como una vocal, la etimología de la letra I se remonta en la “iota” griega</p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('/UnidadSCH/actividades/clase', "I") }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@stop
