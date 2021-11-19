<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-asistencia">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-Label="Close">
                    <span aria-hidden="true">X</span>

                </button>
                <h4 class="modal-title">Registrar Asistencia</h4>
            </div>

            <div class="modal-body">
                {{ Form::open(['url' => 'DocenteSCH/Asistencia']) }}
                {{Form::token()}}
                <div class="form-group row">
                    <label for="idNivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>
                    <div class="col-md-6">
                        <input id="idNivel" type="text" placeholder="0123456789"
                            class="form-control{{ $errors->has('idNivel') ? ' is-invalid' : '' }}" name="idNivel"
                            value="{{ $nivel->nombreN }}" readonly>
                        <input type="hidden" name="idNivel2" value="{{ $nivel->id }}">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="nombreP" class="col-md-4 col-form-label text-md-right">{{ __('Paralelo') }}</label>

                    <div class="col-md-6">
                        <input id="nombreP" type="text" placeholder="0123456789" class="form-control{{ $errors->has('nombreP') ? ' is-invalid' : '' }}" name="nombreP" value="{{$parall->nombreP}}" readonly>

                        @if ($errors->has('nombreP'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombreP') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{ Form::close() }}
            </div>



        </div>


    </div>
</div>
