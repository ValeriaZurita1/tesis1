@extends ('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    {{-- <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h4>Reporte de Asistencias:
                <a href="{{ url('Admin/Reportes/Asistencia/usuario/pdf') }}"><button type="button"
                        class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Generar</button></a>
            </h4>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Asistencia</h3>
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
                            <th>Nivel</th>
                            <th>Paralelo</th>
                            <th><i class="fa fa-cogs"></i> Opciones </th>
                        </tr>
                        @foreach ($paralelos as $paralelo)
                            <tr>
                                <td> {{ $paralelo->nombreN }} </td>
                                <td> {{ $paralelo->nombreP }} </td>
                                {{-- <td> <button href="{{ url('DocenteSCH/Asistencia/paralelo', $paralelo->paralelo_id) }}"
                            type="button" class="btn btn-primary">Registrar</button> </td> --}}
                                <td> <a href="{{ url('UnidadSCH/Asistencia/paralelo', $paralelo->paralelo_id) }}"
                                        type="button" class="btn btn-primary"> Asistencia </a> </td>
                            </tr>
                        @endforeach
                        {{-- @include('Administrador.Asistencia.modal') --}}
                        {{-- @include('Administrador.Usuarios.modal2') --}}
                        {{-- @include('Administrador.Asistencia.modalA')
                @include('Administrador.Asistencia.modalF')
                @endforeach --}}
                    </table>
                </div>
                {{-- {{$userC->render()}} --}}
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
