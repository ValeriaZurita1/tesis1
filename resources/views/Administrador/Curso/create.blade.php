@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            
			<h3>Nuevo Curso</h3>
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
			{!!Form::open(array('url'=>'UnidadSCH/Curso','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}} 
<br>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                        {{--@csrf--}}

                       <!--nuevos dtos para el nombre del nivel  -->
                        <!--  -->
                        <div class="form-group row">
                            
                            <label for="nombreN" class="col-md-4 col-form-label text-md-right">{{ __('Nombre :') }}</label>

                            <div class="col-md-6">
                                <input id="nombreN" type="text" placeholder="Nombre del curso .. " class="form-control{{ $errors->has('nombreN') ? ' is-invalid' : '' }}" name="nombreN" value="{{ old('nombreN') }}" required autofocus>

                                @if ($errors->has('nombreN'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreN') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
			
			


			{!!Form::close()!!}

		
@endsection