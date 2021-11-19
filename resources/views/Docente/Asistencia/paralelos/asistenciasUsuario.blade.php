@extends ('layouts.docente')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Asistencias del usuario:  {{$paraleloUsuario->user->name}} {{$paraleloUsuario->user->apellido}} </h3>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-asistencia">Registrar</button>
        </div>
        @include('Docente.Asistencia.paralelos.modalAsistenciaParalelo')
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
                        @foreach ($paraleloUsuario->asistencia as $asistencia)
                            <tr>
                                <td> {{ $asistencia->DescripAsis }} </td>
                                <td> {{ $asistencia->fechaAsis }} </td>
                                {{-- <td> <a href="#" type="button" class="btn btn-primary" > Informe </a>
                                    <a href="#" type="button" class="btn btn-success" > Registro </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
