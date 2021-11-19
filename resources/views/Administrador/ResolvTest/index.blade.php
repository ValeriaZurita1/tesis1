@extends ('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <div class="row">
        <div class="col-md-6">
            <h4> Datos del Test </h4>
        </div>
    </div>
    @isset($test)
        <div class="row">

            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                <h3>Test: </h3>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                <h3> {{ $test->desTest }} </h3>

                {{-- @include('Administrador.Usuarios.search') --}}
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    Listado de Test
                </div>
                {!! Form::open(['url' => 'UnidadSCH/Activ/Regist', 'method' => 'POST', 'autocomplete' => 'off', 'files' => 'true']) !!}
                {{ Form::token() }}
                <input type="hidden" name="idTest" value="{{ $test->id }}">
                <div class="box-body table-responsive">
                    @isset($testPreg)
                        @isset($testPreg->pregunta)

                            @if ($testPreg->pregunta->respuestas->count() > 0)
                                <div class="row">
                                    @foreach ($testPreg->pregunta->respuestas as $key => $respuesta)
                                        <div class="col-md-6" style="margin-bottom: 10px;">
                                            <div class="col-md-6 col-lg-6">
                                                <img src="{{ asset('/img/Resp/' . $respuesta->descripR) }}" width="200" height="200"
                                                    alt="Image Respuesta">
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <p> {{ $key + 1 }} </p>
                                                <input type="radio" name="idRespuesta" value="{{ $respuesta->id }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <input name="agregar" type="submit" class="btn btn-primary" id="agregar" value="Registrar">
                                </div>
                            @else
                                <p> No existen datos de preguntas o respuestas asociadas al test </p>
                            @endif

                            {!! Form::close() !!}
                        @endisset
                        @empty($testPreg->pregunta)
                            <p> No existen preguntas asociadas al test </p>
                        @endempty
                    @endisset
                    @empty($testPreg)
                        <p> No existen datos de test, por favor solicite el registro de test </p>
                    @endempty
                </div>
            </div>
        </div>
    @endisset
    @empty($test)
        <br>
        <p> No existen datos del test, por favor registre los datos del test </p>

    @endempty


@endsection
