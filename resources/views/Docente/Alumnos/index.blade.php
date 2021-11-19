@extends ('layouts.docente')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/</h5> --}}
    <h5><a href="{{asset('DocenteSCH/Curso')}}">{{$nivel->nombreN}}</a>> Paralelo: 
                <a href="#">{{$parall->nombreP}}</a>> Fecha: 
                <a href="#">{{$anio->fechaA}}</a>
            </h5>
		<h3>Alumnos: 
      <a href="{{URL::action('DocAlumnosController@AddEst',$valor)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Agregar</button></a>
    </h3><br>

		<h3>Listado de Alumnos</h3> 
	</div>
</div>



      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                  <th>Nombre</th>
		 			        <th>Apellido</th>
                  
                  <th>Dirección</th>
                  
                  <th>Telefono</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Rol</th>                
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>
                <tr>
                	@foreach ($user as $usd)
                  <td>{{$usd->nomb}}</td>
		 			        <td>{{$usd->apell}}</td>
                  <td>{{$usd->direcc}}</td>
                  <td>{{$usd->telef}}</td>
                  
                  <td>{{$usd->cel}}</td>
                  <td>{{$usd->correo}}</td>
                  <td>{{$usd->Rol}}</td>
                  <td>
                  	<a href="" data-target="#modal-delete-{{$usd->idR}}" data-toggle="modal"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-user-times"></i> Eliminar</button></a>
                  </td>
                </tr>
                @include('Docente.Alumnos.modal')
                @endforeach               
              </table>
            </div>
          </div>
        </div>
      </div>

@endsection