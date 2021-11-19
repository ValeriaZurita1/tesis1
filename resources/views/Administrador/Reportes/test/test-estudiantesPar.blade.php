@extends ('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h4>Reporte de Test de un Estudiante:
                <a href="{{ url('Admin/Reportes/Test/user/pdf') }}"><button type="button"
                        class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Generar</button></a>
            </h4>
        </div>
    </div>

    <div class="row">

        @isset($paraleloUsuario)
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <p>Curso: {{ $paraleloUsuario->paralelo->nivel->nombreN }} - {{ $paraleloUsuario->paralelo->nombreP }}</p>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <p> Alumno: {{ $paraleloUsuario->user->name }} {{ $paraleloUsuario->user->apellido }} </p>
            </div>
        @endisset

        @if ($promedios['promedioTodosTest'])
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <p>
                    <strong> Promedio de calificación de todos los test: </strong> {{ $promedios['promedioTodosTest'] }} s
                </p>
            </div>
        @endif
    </div>

    @isset($paraleloUsuario)
        <div class="row" style="margin-bottom: 15px; margin-top: 15px;">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                @include('Administrador.Reportes.test.selects.test')
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                @include('Administrador.Reportes.test.selects.intervaloFechas')
            </div>
        </div>
    @endisset

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <h4> Registros de notas del test </h4>
                    </div>
                    @isset($dataTest)
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            <p> <strong> Test: </strong> {{ $dataTest->descripcion }} </p>
                        </div>
                    @endisset

                    @isset($promedios['promedioTest'])
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            <p> <strong> Promedio de nota: </strong> {{ $promedios['promedioTest'] }}</p>
                        </div>
                    @endisset
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <tr>
                            <th>Test</th>
                            <th>Nota</th>
                            {{-- <th><i class="fa fa-cogs"></i> Opciones </th> --}}
                        </tr>
                        @foreach ($desactivTest as $desactiv)
                            <tr>
                                <td>{{ $desactiv->desTest }}</td>
                                <td>{{ $desactiv->notaDes }}</td>
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
