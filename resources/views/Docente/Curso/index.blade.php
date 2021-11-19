@extends ('layouts.docente')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		{{-- <h3>Curso: 
      <a href="Curso/create"><button type="button" class="btn btn-outline-success"><i class="fa fa-address-card" aria-hidden="true"></i> Nuevo</button></a>
    </h3><br> --}}

		<h3>Listado de Curso</h3>
		{{-- @include('Docente.Curso.search') --}}
	</div>
</div>



      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Listado de materiales</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                  <th>Nivel</th>
                  <th>Paralelo</th>
                  <th>Fecha</th>               
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>
                <tr>
                	@foreach ($curso as $usd)
                  {{-- @if ($usd->estado=='1') --}}
                  <td>{{$usd->Nivel}}</td>
                  <td>{{$usd->Paralel}}</td>
		 			        <td>{{$usd->fecha}}</td> 
                  <td>
                    <a href="{{URL::action('DocAlumnosController@verList',$usd->id)}}"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-user-plus"></i>Usuarios Agg.</button></a>
                  </td>
                </tr>
                {{-- @endif --}}
                {{-- @include('Docente.Curso.modal') --}}
                {{-- @include('Administrador.Curso.modal2') --}}
                @endforeach               
              </table>
            </div>
            {{$curso->render()}}
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection