@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Respuesta: {{$preg->desPreg}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors -> all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
	</div>
</div>

	
			

<form method="POST" action="/UnidadSCH/Test/Resp/{{$resp->id}}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <!-- <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"> -->
                       

                        <!--nuevos dtos  -->
                        <div class="form-group row">
                            <label for="desTest" class="col-md-4 col-form-label text-md-right">{{ __('Test') }}</label>

                            <div class="col-md-6">

                                <input id="desTest" type="text" placeholder="0123456789" class="form-control{{ $errors->has('desTest') ? ' is-invalid' : '' }}" name="desTest" value="{{$test->desTest}}" readonly>
                                <input type="hidden" name="idTest" value="{{$test->id}}">
                            </div>
                        </div>
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
                            <label for="descripR" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta') }}</label>

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
                                <input id="notaR" type="text" placeholder="Nombre Apellido" class="form-control{{ $errors->has('notaR') ? ' is-invalid' : '' }}" name="notaR" value="{{$resp->notaR}}" required autofocus>

                                @if ($errors->has('notaR'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notaR') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->
                        <!--  -->
                        
                        <!--  -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary offset-md-8">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
</form>		
@endsection