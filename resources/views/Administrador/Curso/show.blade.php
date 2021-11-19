@extends ('layouts.admin')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Curso:  {{$nivel->nombreN}}
        <a href="{{ url('UnidadSCH/Curso/paralelo/create',$nivel->id)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-address-card" aria-hidden="true"></i> Nuevo</button></a>
        </h3><br>

		<h3>Listado de Paralelo</h3><br>
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
                  <th>Paralelo</th>               
                  <th>Fecha</th> 
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>

                <tr>
                  @foreach ($paralelos as $paralelo)
                  {{-- @if ($usd->estado=='1') --}}
                  <td>{{$paralelo->nombreP}}</td>
                  {{--<td>{{$curso->Paralel}}</td>--}}
		 		          <td>{{$paralelo->created_at}}</td> 
                 
                  <td>
                    <a href="{{ url('UnidadSCH/Curso/paralelo/edit', $paralelo->id) }}"><button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$paralelo->id}}"  data-toggle="modal"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-window-close-o"></i> Eliminar</button></a>
                    <a href="{{ url('UnidadSCH/Curso/paralelo/estudiantes', $paralelo->id)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-eye"></i> Ver</button></a> 
                  </td>
                </tr>
                {{-- @endif --}}
               
                @include('Administrador.Curso.modal3')

                @endforeach               
            </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection