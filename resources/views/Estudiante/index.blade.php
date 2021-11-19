@extends('layouts.user')

<link rel="stylesheet" href="{{ asset('css/tresColAdm.css') }}">

@section('content')
    <div class="container">

        <div class="row justify-content-center align-items-center title">
            <div class="col-md-2">
                <img src="{{ asset('img/logo.jpg') }}" alt="" width="150" height="110">
            </div>
            <div class="col-md-9">
                <h2 class="">Unidad Educativa Sordos Chimborazo</h2>
            </div>
        </div>
        <div class="row text-center video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/VKWCFeE0XRk" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <div class="row descripcion">
            <div class="col-md-12">
                <p> Bienvenidos al panel de administración de la UESCH, en esta sección podras registrar tu asistencia
                    y realizar las actividades y los tests planteados por el docente
                </p>
            </div>
        </div>

    </div>
@stop
