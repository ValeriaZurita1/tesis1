<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-registA-{{$valor}}">
{!!Form::open(array('url'=>'DocenteSCH/Test/Resp','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                        @csrf
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Registrar Respuesta</h4>
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
                            <label for="desPreg" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta') }}</label>

                            <div class="col-md-6">

                                <input id="desPreg" type="text" placeholder="0123456789" class="form-control{{ $errors->has('desPreg') ? ' is-invalid' : '' }}" name="desPreg" value="{{$preg->desPreg}}" readonly>
                                <input type="hidden" name="idPreg" value="{{$preg->id}}">
                            </div>
                        </div> 
                        <!-- -->
                        <div class="form-group row">
                            <label for="descripR" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion Respuesta') }}</label>

                            <div class="col-md-6"> 

                                <input id="descripR" type="file" name="descripR" value="{{ old('descripR') }}" required autofocus>

                                @if ($errors->has('descripR'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripR') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--  -->
                        <div class="form-group row">
                            <label for="notaR" class="col-md-4 col-form-label text-md-right">{{ __('Valor de respuesta') }}</label>

                            <div class="col-md-6"> 
                                <input id="notaR" type="text" class="form-control{{ $errors->has('notaR') ? ' is-invalid' : '' }}" name="notaR" value="{{ old('notaR') }}" required autofocus>

                                @if ($errors->has('notaR'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notaR') }}</strong>
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