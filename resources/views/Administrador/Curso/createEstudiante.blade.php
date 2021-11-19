@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Curso {{$paralelo->nombreP}}<br><br>
			<h3>Nuevo Estudiante : </h3>
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


{!!Form::open(array('action' => array('AdminCursoController@store_Estudiante',$paralelo->id),'method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}} 

<br>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                        

                       <!--nuevos datos para el estudiante  -->
                                              
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Nombres :') }}</label>

                            <div class="col-md-6">
                                <select name="user_id" class="form-control" required>
                                    @foreach($estudiantes as $tpu)
                                        <option value="{{$tpu->id}}" readonly="readonly" selected>{{$tpu->name}} {{$tpu->apellido}}</option>
                                    @endforeach
                                </select>
                             
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