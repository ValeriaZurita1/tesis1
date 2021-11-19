@extends ('layouts.admin')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/Reporte Aplicaciones</h5> --}}
		<h3>Reporte General Asistencia: <a href="lista/create"><button type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i> Generar</button></a>
    <a href="" data-target="#modal-foto-{{$asisR->id='1'}}" data-toggle="modal"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-image-o"></i> Buscar</button></a></h3>
    @include('Administrador.Reportes.asistencia.modal2')

		
		{{-- @include('GestorMSA.Reportes.aplicacion.search') --}}
    <h3>Listado de Asistencia</h3> 
	</div>
</div>



      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Nivel</th>                
                  {{-- <th><i class="fa fa-cogs"></i> Opciones </th> --}}
                </tr>
                <tr>
                  @foreach ($asisR as $usd)
                  {{-- @if ($usd->id!='1')  --}}
                  <td>UESCH{{$usd->id}}</td>
                  <td>{{$usd->DesAsis}}</td>
                  <td>{{$usd->fechaAsis}}</td>
                  <td>{{$usd->lvl}} {{$usd->cP}}</td>
                  {{-- <td> --}}
                    {{-- <a href="" data-target="#modal-foto-{{$usd->id}}" data-toggle="modal"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-image-o"></i> Examinar</button></a>  --}}
                    
                  {{-- </td> --}}
                </tr>
                {{-- @endif --}}
                {{-- @include('GestorMSA.Aplicaciones.modal') --}}
                {{-- @include('GestorMSA.Aplicaciones.modal2') --}}
                @endforeach           
              </table>
            </div>
            {{-- {{$asisR->render()}} --}}
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection