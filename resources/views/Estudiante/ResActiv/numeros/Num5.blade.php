@extends ('layouts.user')
<link rel="stylesheet" href="{{asset('css/cajaP.css')}}">
@section ('content')
	{{-- <div class="container"> --}}
		<!-- -->
		<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Actividad Rompecabezas</h3>

              <div class="box-tools pull-left">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              	<div class="small-box bg-white">
            <div class="inner">
              <img src="{{asset('img/numero/5.jpg')}}" width="290" height="100" />

              {{-- <center><p>Vocales</p></center> --}}
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i> 
            </div>
          </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Nombre:
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> {{$VocalA[0]->Alumno}}</span></a></li>
                <li><a href="#">Tiempo: <span class="pull-right text-green"><i class="fa fa-angle-up"></i> {{$VocalA[0]->tiempo}}</span></a>
                </li>
                
              </ul>
            </div>
            <!-- /.footer -->
          </div>
		<!-- -->
		<div class="box box-Test">
            <div class="box-header with-border">
              <h3 class="box-title">Actividad Test</h3>

              <div class="box-tools pull-left">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              	<center><p>{{$TestA[0]->descTest}}</p></center>
              	{{-- <div class="small-box bg-white"> --}}

          {{-- </div> --}}
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Nombre:
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> {{$TestA[0]->nombUsDes}}</span></a></li>
                <li><a href="#">Fecha: <span class="pull-right text-green"><i class="fa fa-angle-up"></i> {{$TestA[0]->fechaDes}}</span></a>
                </li>
                <li><a href="#">Nota: <span class="pull-right text-green"><i class="fa fa-angle-up"></i> {{$TestA[0]->notaDes}}</span></a>
                </li>
                
              </ul>
            </div>
            <!-- /.footer -->
          </div>
		<!-- -->
	{{-- </div>  --}}
@endsection