@extends ('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/
                <a href="{{asset('GestorMSA/Usuarios')}}">Usuarios</a>/Create
            </h5> --}}
            <h3>Nuevo Test</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    {{-- {!!Form::open(array('url'=>'UnidadSCH/Usuarios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}} --}}

    <div class="container">
        {{--  --}}{{--  --}}
        <div class="card-body">
            {{-- <form method="POST" action="UnidadSCH/Usuarios" aria-label="{{ __('Create') }}"> --}}
            {!! Form::open(['url' => 'UnidadSCH/Test', 'method' => 'POST', 'autocomplete' => 'off', 'files' => 'true']) !!}
            {{ Form::token() }}
            @csrf

            <div class="form-group row">
                <label for="desTest" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="desTest" type="text" class="form-control{{ $errors->has('desTest') ? ' is-invalid' : '' }}"
                        name="desTest" value="{{ old('desTest') }}" required autofocus>

                    @if ($errors->has('desTest'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('desTest') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{--  --}}
            <div class="form-group row">
                <label for="genero"
                    class="col-md-4 col-form-label text-md-right">{{ __('Seleccion Genero Actividad') }}</label>

                <div class="col-md-6">
                    <!-- <div class="col-sm-4"> -->
                    <select name="tipoTest" id="gActivid" class="form-control">
                        @foreach ($act as $tps)
                            <option value="{{ $tps->id }}">
                                {{ $tps->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <!-- </div> -->

                    @if ($errors->has('genero'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('genero') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- -->
            <div class="form-group row">
                <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Seleccion Actividad') }}</label>

                <div class="col-md-6">
                    <!-- <div class="col-sm-4"> -->
                    <select name="SA" id="selAct" class="form-control">

                    </select>
                    <!-- </div> -->

                    @if ($errors->has('genero'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('genero') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{--  --}}

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
            {{-- </form> --}}
            {!! Form::close() !!}
        </div>
    </div>





    {{-- </form> --}}
    @push('scripts')
        <script>
            var selGA = {
                _limpiar: function() {
                    // $("#selAct option:selected").val("");
                    // $('#selAct').append("");
                    $("#selAct option:selected").val("");
                    // $("#selAct option:selected").text("");
                    $("#selAct").text("");
                },

                _agregar: function() {
                    gActic = $("#gActivid option:selected").val();
                    if (gActic == 1) {
                        selGA._limpiar();
                        var fila4 =
                            '<option value="1">A</option><option value="2">E</option><option value="3">I</option><option value="4">O</option><option value="5">U</option>';
                        $('#selAct').append(fila4);
                        // $('#selAct').appendChild(fila1);
                        // document.body.appendChild(fila1);
                    } else {
                        if (gActic == 2) {
                            selGA._limpiar();
                            var fila1 =
                            '<option value="6">Elefante</option><option value="7">Gallo</option><option value="8">Gato</option><option value="9">Perro</option><option value="10">Vaca</option>';
                            $('#selAct').append(fila1);
                        } else {
                            if (gActic == 3) {
                                selGA._limpiar();
                                var fila2 =
                                    '<option value="11">Abuelo</option><option value="12">Hermano</option><option value="13">Mama</option><option value="14">Papa</option><option value="15">Primo</option>';
                                $('#selAct').append(fila2);
                            } else {
                                selGA._limpiar();
                                var fila3 =
                                    '<option value="16">1</option><option value="17">2</option><option value="18">3</option><option value="19">4</option><option value="20">5</option>';
                                $('#selAct').append(fila3);
                            }
                        }
                    }
                },

                _get: function(id) {
                    return document.getElementById(id);
                }

            };



            window.onload = function() {
                // var cr=agregar();
                selGA._get("gActivid").onchange = function() {
                    selGA._agregar();
                }

                selGA._get("gActivid").onclick = function() {
                    selGA._agregar();
                }
            }
        </script>
    @endpush


@endsection
