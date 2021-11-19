@extends ('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/Reporte Aplicaciones</h5> --}}
            @isset($paralelo)
                <h4>Reporte de Actividades de un curso:
                    <a href="{{ url('Admin/Reportes/Actividades/curso/pdf') }}"><button type="button"
                            class="btn btn-outline-success"><i class="fa fa-user-plus"></i>Generar</button></a>
                    {{-- <a href="" data-target="#modal-foto-{{ $asisR->id = '1' }}" data-toggle="modal"><button type="button"
                        class="btn btn-outline-dark btn-sm"><i class="fa fa-file-image-o"></i> Buscar</button></a> --}}
                </h4>
            @endisset
            <h3>Listado de Actividades</h3>
        </div>
    </div>

    @isset($paralelo)
        <div class="row" style="margin-bottom: 15px; margin-top: 15px;">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                @include('Administrador.Reportes.actividad.selects.paralelos')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                            <p> <strong> Curso: </strong> {{ $paralelo->nivel->nombreN }} </p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                            <h5> <strong> Paralelo: </strong> {{ $paralelo->nombreP }} </h5>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Promedio Actividades</th>
                                <th><i class="fa fa-cogs"></i> Opciones </th>
                            </tr>

                            @for ($i = 0; $i < $usuariosParalelo->count(); $i++)
                                <tr>
                                    <td>
                                        {{ $usuariosParalelo[$i]->user->name }} {{ $usuariosParalelo[$i]->user->apellido }}
                                    </td>
                                    <td>{{ $promedios[$i] }} s </td>
                                    <td>
                                        <a href="{{ url('UnidadSCH/Reportes/Actividades/user', $usuariosParalelo[$i]->id) }}"
                                            type="button" class="btn btn-primary"> Ver </a>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                    {{-- {{$asisR->render()}} --}}
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    @endisset

    @empty($paralelo)
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <p> No existen registros de usuarios o paralelos, se debe ingresar datos de paralelos para poder registrar datos
                    de actividades </p>
            </div>
        </div>
    @endempty



@endsection
