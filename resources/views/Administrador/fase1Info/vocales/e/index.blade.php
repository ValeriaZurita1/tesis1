@extends('layouts.admin')

<link rel="stylesheet" href="{{asset('css/Actividad.css')}}">

@section('content')
<div class="container">
    <br>
    {{--  --}}
    <div class="row title center">
        <h4> Vocal E </h4>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <img height="150" width="150" src="{{ asset('/img/fase1/vocale/img1.jpg') }}" alt="">
                </div>
                <div class="col-lg-12 col-md-12">
                    <img height="150" width="150" src="{{ asset('/img/fase1/vocale/img2.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <img height="150" width="150" src="{{ asset('/img/fase1/vocale/img3.jpg') }}" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <iframe width="600" height="400" src="https://www.youtube.com/embed/RVSAnSupptg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 center">
            <a href="{{ url('/UnidadSCH/Vocales/E') }}" class="btn btn-primary btn-lg">Jugar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@stop
