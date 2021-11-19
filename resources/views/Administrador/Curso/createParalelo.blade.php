@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Curso {{$nivel->nombreN}}<br><br>
			<h3>Nuevo Paralelo : </h3>
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

{!!Form::open(array('action' => array('AdminCursoController@store_Paralelo',$nivel->id),'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
                            
                            <br><label for="nombreP" class="col-md-4 col-form-label text-md-right">{{ __('Nombre :') }}</label>

                            <div class="col-md-6">
                                <input id="nombreP" type="text" placeholder="Nombre del paralelo .. " class="form-control{{ $errors->has('nombreP') ? ' is-invalid' : '' }}" name="nombreP" value="{{ old('nombreP') }}" required autofocus>

                                @if ($errors->has('nombreP'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br><br>

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