@extends ('layouts.docente')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

            <h3>Listado de Usuarios del curso </h3>
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
                            <th>Nombres </th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th><i class="fa fa-cogs"></i> Opciones </th>
                        </tr>
                        @foreach ($paralelo->paraleloUsuario as $dataUsuario)
                            <tr>
                                <td> {{ $dataUsuario->user->name }} </td>
                                <td> {{ $dataUsuario->user->apellido }} </td>
                                <td> {{ $dataUsuario->user->email }} </td>
                                <td>
                                    <a href="{{ url('DocenteSCH/Asistencia/paralelo/informe', $dataUsuario->id ) }}" type="button" class="btn btn-primary" > Registro Asistencia </a>
                                </td>
                                {{-- DocenteSCH/Asistencia/paralelo/informe/{paraleloUsuario} --}}
                                {{-- <td> <button href="{{ url('DocenteSCH/Asistencia/paralelo', $paralelo->paralelo_id) }}"
                                        type="button" class="btn btn-primary">Registrar</button> </td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
