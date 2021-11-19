@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Curso:</h3>
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


		
{!!Form::open(array('url'=> array('UnidadSCH/Curso', $nivel->id),'method'=>'PUT','autocomplete'=>'off','files'=>'false'))!!}
{{Form::token()}} 


{{--<form method ="PUT" action="/UnidadSCH/Curso/{{$nivel->id}}" enctype="multipart/form-data">--}}
	
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                   
                    <div class="form-group row">
                           

                        <!--nuevos dtos  -->
                        <!--  -->
                        <div class="form-group row">
                            <label for="nombreN" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>

                            <div class="col-md-6">
                                <input id="nombreN" type="text" placeholder="curso" class="form-control{{ $errors->has('nombreN') ? ' is-invalid' : '' }}" name="nombreN" value="{{$nivel->nombreN}}" required autofocus>

                                @if ($errors->has('nombreN'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreN') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
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
{{--</form>		--}}

{!!Form::close()!!}
@endsection