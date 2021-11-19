@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/
                <a href="{{asset('GestorMSA/Usuarios')}}">Usuarios</a>/Modificar
            </h5> --}}
			<h3>Editar Test: {{$test->desTest}}</h3>
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

	
			

<form method="POST" action="/UnidadSCH/Test/{{$test->id}}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <!-- <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"> -->
                       

                        <div class="form-group row">
                            <label for="desTest" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="desTest" type="text" placeholder="Nombre Apellido" class="form-control{{ $errors->has('desTest') ? ' is-invalid' : '' }}" name="desTest" value="{{$test->desTest}}" required autofocus>

                                @if ($errors->has('desTest'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desTest') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--nuevos dtos  -->
                        <!--  -->
                        <!--fin ndatos  -->                        
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