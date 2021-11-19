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
              <img src="{{asset('img/familia/mama.jpg')}}" width="290" height="100" />

              {{-- <center><p>Vocales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Fam/mama') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/familia/papa.jpg')}}" width="290" height="100" />

              {{-- <center><p>Vocales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Fam/papa') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/familia/herm.jpg')}}" width="290" height="100" />

              {{-- <center><p>Numeros del 1 al 5</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Fam/hermano') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}<br>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/familia/abuelo.jpg')}}" width="290" height="100" />

              {{-- <center><p>Integrantes de la familia</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Fam/abuelo') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/familia/primo.jpg')}}" width="290" height="100" />

              {{-- <center><p>Animales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/EstudianteSCH/Fam/primo') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
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