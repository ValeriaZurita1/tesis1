@extends('layouts.user')

<link rel="stylesheet" href="{{asset('css/Actividad.css')}}">

@section('content')
<div class="container1">
  <div class="sidebar3">
    <br>
    {{--  --}}
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/animales/gato.jpg')}}" width="290" height="100" />

              {{-- <center><p>Vocales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Anim/Gat') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/animales/perro.jpg')}}" width="290" height="100" />

              {{-- <center><p>Vocales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Anim/Perr') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/animales/Gallo.jpg')}}" width="290" height="100" />

              {{-- <center><p>Numeros del 1 al 5</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Anim/Gall') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}<br>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/animales/vaca.jpg')}}" width="290" height="100" />

              {{-- <center><p>Integrantes de la familia</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Anim/Vac') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/animales/elefante.jpg')}}" width="290" height="100" />

              {{-- <center><p>Animales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Anim/Elef') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
    <!-- end .sidebar1 --></div>
  <div class="content1">
    {{-- <center><img src="{{asset('img/título.jpg')}}" width="419" height="115" /></center> --}}
    {{--  --}}
    <h2>Información</h2>
    <p><textarea name="descripcion" cols="40" rows="5" {{-- class="form-control z-depth-1" --}} placeholder="Write something here..." readonly></textarea></p>
    <h2>Descripción</h2>
    <p><textarea name="descrion" cols="40" rows="10" placeholder="Write something here..." readonly></textarea></p>

    {{--  --}}
    <!-- end .content --></div>
  </div>

@stop
