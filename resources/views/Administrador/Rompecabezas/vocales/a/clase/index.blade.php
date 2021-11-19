@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/Actividad.css') }}">

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-6 cl-lg-12 center">
                <h1> Clase letra A </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-6 center">
                <iframe width="600" height="400" src="https://www.youtube.com/embed/dUvAtCTGNiM"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="row button">
            <a class="center" href="{{ url('/UnidadSCH/Vocales/A') }}"><button type="button"
                    class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i> Siguiente</button></a>
        </div>
    </div>


@stop
