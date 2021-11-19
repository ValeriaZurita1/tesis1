@extends ('layouts.docente')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Curso: {{$parall->nombreP}}</h3>
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

	
			

<form method="POST" action="/DocenteSCH/Curso/{{$parall->id}}" enctype="multipart/form-data">
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
                                <input id="nombreP" type="text" placeholder="0123456789" class="form-control{{ $errors->has('nombreP') ? ' is-invalid' : '' }}" name="nombreP" value="{{$parall->nombreP}}" required autofocus>

                                @if ($errors->has('nombreP'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->

                        <div class="form-group row">
                            <label for="fechaA" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fechaA" type="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="AAAA-MM-DD" class="form-control{{ $errors->has('fechaA') ? ' is-invalid' : '' }}" name="fechaA" value="{{$anio->fechaA}}" required autofocus>


                                @if ($errors->has('fechaA'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechaA') }}</strong>
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