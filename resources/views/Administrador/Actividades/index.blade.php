@extends('layouts.admin')

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
              <img src="{{asset('img/vocal.jpg')}}" width="290" height="100" />

              <center><p>Vocales</p></center>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/UnidadSCH/actividades/vocales') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/numero.jpg')}}" width="290" height="100" />

              <center><p>Numeros del 1 al 5</p></center>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/UnidadSCH/actividades/numeros') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}<br>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/familia.jpg')}}" width="290" height="100" />

              <center><p>Integrantes de la familia</p></center>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/UnidadSCH/actividades/familia') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        {{--  --}}
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/animal.jpg')}}" width="290" height="100" />

              <center><p>Animales</p></center>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/UnidadSCH/actividades/animales') }}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
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
  {{-- <div class="sidebar4">
    <h2>CALENDARIO</h2>
    <div class="col one-sixth2">
          <center>
            <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FGuayaquil&amp;src=ZW4uZWMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%230B8043" style="border:solid 1px #777" width="240" height="245" frameborder="0" scrolling="no"></iframe>
          </center>
        </div>--}}
  <!-- end .container -->
  </div>
 
@stop