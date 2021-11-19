@extends ('layouts.docente')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
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
                                <td> <a href="{{ url('DocenteSCH/Asistencia/paralelo', $paralelo->paralelo_id) }}"
                                    type="button" class="btn btn-primary"> Asistencia </a> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
