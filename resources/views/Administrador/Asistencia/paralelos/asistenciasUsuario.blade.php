@extends ('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h4>Reporte de Asistencias:
                <a href="{{ url('Admin/Reportes/Asistencia/usuario/pdf') }}"><button type="button"
                        class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Generar</button></a>
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <p> <strong> Curso: </strong> {{ $paraleloUsuario->paralelo->nivel->nombreN }} -
                {{ $paraleloUsuario->paralelo->nombreP }} </p>
        </div>
    </div>

    <div class="row">
        @include('Administrador.Asistencia.paralelos.intervaloFechas')
    </div>

    <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Listado de Asistencias del usuario: {{ $paraleloUsuario->user->name }}
                {{ $paraleloUsuario->user->apellido }} </h3>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top: 20px;">
            <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#modal-asistencia">Registrar</button>
        </div>
        @include('Administrador.Asistencia.paralelos.modalAsistenciaParalelo')
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body table-responsive no-padding">

                    <div class="row">
                        @include('layouts.message')
                    </div>

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <tr>
                            <th> Descripción </th>
                            <th>Fecha </th>
                            {{-- <th><i class="fa fa-cogs"></i> Opciones </th> --}}
                        </tr>
                        @if (isset($asistencias))
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td> {{ $asistencia->DescripAsis }} </td>
                                    <td> {{ $asistencia->fechaAsis }} </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($paraleloUsuario->asistencia as $asistencia)
                                <tr>
                                    <td> {{ $asistencia->DescripAsis }} </td>
                                    <td> {{ $asistencia->fechaAsis }} </td>
                                </tr>
                            @endforeach
                        @endif

                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>



@endsection
