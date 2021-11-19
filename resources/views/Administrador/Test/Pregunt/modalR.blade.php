<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-registA-{{$valor}}">
{!!Form::open(array('url'=>'UnidadSCH/Test/Preg','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                        @csrf
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Registrar Pregunta</h4>
	</div>
	<div class="modal-body">
		{{-- <p>Confirme si desea Eliminar Usuario</p> --}}
		{{--  --}}
		                <div class="form-group row">
                            <label for="desTest" class="col-md-4 col-form-label text-md-right">{{ __('Test') }}</label>

                            <div class="col-md-6">

                                <input id="desTest" type="text" placeholder="0123456789" class="form-control{{ $errors->has('desTest') ? ' is-invalid' : '' }}" name="desTest" value="{{$test->desTest}}" readonly>
                                <input type="hidden" name="idTest" value="{{$test->id}}">
                            </div>
                        </div>                        <!--nuevos dtos  -->
                        <!--  -->
                        <div class="form-group row">
                            <label for="desPreg" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6"> 
                                <input id="desPreg" type="text" class="form-control{{ $errors->has('desPreg') ? ' is-invalid' : '' }}" name="desPreg" value="{{ old('desPreg') }}" required autofocus>

                                @if ($errors->has('desPreg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desPreg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--  -->

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