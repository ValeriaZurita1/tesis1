<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-regist-{{auth::user()->id}}">
{!!Form::open(array('url'=>'DocenteSCH/Asistencia','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                        @csrf
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Registrar Asistencia</h4>
	</div>
	<div class="modal-body">
		{{-- <p>Confirme si desea Eliminar Usuario</p> --}}
		{{--  --}}
		<div class="form-group row">
                            <label for="idNivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>

                            <div class="col-md-6">

                                <input id="idNivel" type="text" placeholder="0123456789" class="form-control{{ $errors->has('idNivel') ? ' is-invalid' : '' }}" name="idNivel" value="{{$nivel->nombreN}}" readonly>
                                <input type="hidden" name="idNivel2" value="{{$nivel->id}}">
                            </div>
                        </div>                        <!--nuevos dtos  -->
                        <!--  -->
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
                        <!--  -->

                        <div class="form-group row">
                            <label for="fechaA" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Curso') }}</label>

                            <div class="col-md-6">
                                <input id="fechaA" type="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="AAAA-MM-DD" class="form-control{{ $errors->has('fechaA') ? ' is-invalid' : '' }}" name="fechaA" value="{{$anio->fechaA}}" readonly>


                                @if ($errors->has('fechaA'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechaA') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--  --}}
                        <div class="form-group row">
                            <label for="nombreP" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="nombreP" type="text" placeholder="{{auth::user()->name}} {{auth::user()->apellido}}" class="form-control{{ $errors->has('nombreP') ? ' is-invalid' : '' }}" name="nombreP" value="" readonly>

                                @if ($errors->has('nombreP'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--  --}}
		{{--  --}}
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary">Confirmar</button>
	</div>

	</div>
</div>
{{Form::Close()}}	

</div>