@extends ('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h4>Reporte de Actividades de un curso:
                <a href="{{ url('Admin/Reportes/Actividades/user/pdf') }}"><button type="button"
                        class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Generar</button></a>
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            <p>Curso: {{ $paraleloUsuario->paralelo->nivel->nombreN }} - {{ $paraleloUsuario->paralelo->nombreP }}</p>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            <p> Alumno: {{ $paraleloUsuario->user->name }} {{ $paraleloUsuario->user->apellido }} </p>
        </div>

        @if ($promedios['promedioActividades'])
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <p>
                    <strong> Promedio de tiempo todas las actividades: </strong> {{ $promedios['promedioActividades'] }} s
                </p>
            </div>
        @endif
    </div>

    <div class="row" style="margin-bottom: 15px; margin-top: 15px;">
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            @include('Administrador.Reportes.actividad.selects.seccionActivs')
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
            @include('Administrador.Reportes.actividad.selects.intervaloFechas')
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <h4> Registros de tiempo de la actividad </h4>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <p> <strong> Actividad: </strong> {{ $dataSecAct->descripcion }} </p>
                    </div>
                    @if ($promedios['promedioActividad'])
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            <p> <strong> Promedio de tiempo: </strong> {{ $promedios['promedioActividad'] }} s</p>
                        </div>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <tr>
                            <th>Actividad</th>
                            <th>Tiempo</th>
                            {{-- <th><i class="fa fa-cogs"></i> Opciones </th> --}}
                        </tr>
                        @foreach ($desactivsUser as $desactiv)
                            <tr>
                                <td>{{ $desactiv->descripcion }}</td>
                                <td>{{ $desactiv->tiempo }}</td>
                                {{-- <td>
                                    <a href="{{ url('DocenteSCH/Asistencia/paralelo/informe', $dataUsuario->id ) }}" type="button" class="btn btn-primary" > Registro Asistencia </a>
                                </td> --}}
                            </tr>
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
