@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paralelo :</h3><br><br>
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


		
{!!Form::open(array('url'=> array('UnidadSCH/Curso/paralelo', $paralelo->id),'method'=>'PUT','autocomplete'=>'off','files'=>'false'))!!}
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
                            <label for="nombreP" class="col-md-4 col-form-label text-md-right">{{ __('Paralelo') }}</label>

                            <div class="col-md-6">
                                <input id="nombreP" type="text" placeholder="curso" class="form-control{{ $errors->has('nombreP') ? ' is-invalid' : '' }}" name="nombreP" value="{{$paralelo->nombreP}}" required autofocus>

                                @if ($errors->has('nombreP'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreP') }}</strong>
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