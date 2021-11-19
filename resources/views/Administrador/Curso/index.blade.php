@extends ('layouts.admin')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Curso: 
      <a href="Curso/create"><button type="button" class="btn btn-outline-success"><i class="fa fa-address-card" aria-hidden="true"></i> Nuevo</button></a>
    </h3><br>

		<h3>Listado de Curso</h3><br>
		@include('Administrador.Curso.search')
    <br>
	</div>
</div>


      <div class="row">
        @include('layouts.message')
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
                  <th>Fecha</th>               
                  <th>Colegio</th>
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>
                <tr>
                	@foreach ($cursos as $curso)
                  {{-- @if ($usd->estado=='1') --}}
                  <td>{{$curso->nombreN}}</td>
                  {{--<td>{{$curso->Paralel}}</td>--}}
		 			        <td>{{$curso->created_at}}</td> 
                   <td>{{$curso->colegio->nombre}}</td> 
                  <td>
                    <a href="{{URL::action('AdminCursoController@edit',$curso->id)}}"><button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$curso->id}}" data-toggle="modal"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-window-close-o"></i> Eliminar</button></a>
                    <a href="{{ url('UnidadSCH/Curso/paralelo', $curso->id) }}"><button type="button" class="btn btn-outline-success"><i class="fa fa-eye"></i> Ver</button></a> 
                  </td>
                </tr>
                {{-- @endif --}}
                @include('Administrador.Curso.modal')
                {{-- @include('Administrador.Curso.modal2') --}}
                @endforeach               
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection