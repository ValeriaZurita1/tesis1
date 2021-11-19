@extends ('layouts.admin')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/</h5> --}}
    <h5><a href="{{asset('UnidadSCH/Test')}}">{{$test->desTest}}</a>>
        <a href="{{URL::action('AdminTestController@verList',$test->id)}}">{{$preg->desPreg}}</a>
            </h5>
		<h3>Respuesta:
      {{-- <a href="Alumnos/create"><button type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i> Nuevo</button></a> --}}
      {{-- <a href="{{URL::action('AlumnosController@AddEst',$valor)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Agregar</button></a> --}}
      <a href="" data-target="#modal-registA-{{$valor}}" data-toggle="modal"><button type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i> Registrar</button></a>
    </h3><br>
    @include('Administrador.Test.Respuest.modalR')
		<h3>Listado de Respuestas</h3>
		{{-- @include('Administrador.Usuarios.search') --}}
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
                  {{-- <th>Codigo</th> --}}
                  <th>Nombre</th>
                  <th>Nota</th>
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>
                <tr>
                	@foreach ($resp as $usd)
                  {{-- @if ($usd->estado=='1') --}}
                  {{-- <td>FIEUSR{{$usd->id}}</td><td></td> --}}
                  <td> <img src="{{asset('/img/Resp/'.$usd->descripR) }}" width="200" height="200" alt="Imagen Test"></td>
                  <td>{{$usd->notaR}}</td>
                  <td>
                  	{{-- <a href="" data-target="#modal-foto-{{$usd->id}}" data-toggle="modal"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-image-o"></i> Foto</button></a> --}}
                    <a href="{{URL::action('AdminRespController@edit',$usd->id)}}"><button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$usd->id}}" data-toggle="modal"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-user-times"></i> Eliminar</button></a>
                    {{-- <a href="" data-target="#modal-delete-{{$usd->idR}}" data-toggle="modal"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-user-times"></i> Eliminar</button></a> --}}
                  </td>
                </tr>
                {{-- @endif --}}
                @include('Administrador.Test.Respuest.modal')
                {{-- @include('Administrador.Usuarios.modal2') --}}
                @endforeach
              </table>
            </div>
            {{-- {{$usuario->render()}} --}}
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection
