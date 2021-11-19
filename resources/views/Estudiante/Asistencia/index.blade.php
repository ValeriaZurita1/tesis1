@extends ('layouts.user')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->


    @if ($paraleloUsuario)

        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                @include('Estudiante.Asistencia.paralelosUsuarios')
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/</h5> --}}
                {{-- <h3>Asistencia: <a href="{{URL::action('AdminAsistController@AddEst',auth::user()->id)}}"><button type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i> Registrar</button></a></h3><br> --}}
                <h3>Asistencia: <a href="" data-target="#modal-regist-{{ auth::user()->id }}" data-toggle="modal"><button
                            type="button" class="btn btn-outline-success"><i class="fa fa-user-plus"></i>
                            Registrar</button></a>
                </h3><br>
                @include('Estudiante.Asistencia.modalR')

                <h3>Listado de Asistencia</h3>
                {{-- @include('Administrador.Asistencia.search') --}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <h4> Nivel: {{ $paraleloUsuario->paralelo->nivel->nombreN }} </h4>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <h4> Paralelo: {{ $paraleloUsuario->paralelo->nombreP }} </h4>
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
                        <div class="row">
                            @include('layouts.message')
                        </div>
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                            </tr>
                            @foreach ($asistencias as $asis)
                                <tr>
                                    <td>{{ $asis->DescripAsis }}</td>
                                    <td>{{ $asis->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <p> No existen datos de cursos asociado al estudiante </p>
            </div>
        </div>
    @endif


@endsection
