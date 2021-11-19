@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Pregunta: {{$preg->desPreg}}</h3>
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

	
			

<form method="POST" action="/UnidadSCH/Test/Preg/{{$preg->id}}" enctype="multipart/form-data">
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
                                <input id="desPreg" type="text" placeholder="Nombre Apellido" class="form-control{{ $errors->has('desPreg') ? ' is-invalid' : '' }}" name="desPreg" value="{{$preg->desPreg}}" required autofocus>

                                @if ($errors->has('desPreg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desPreg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->
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