@extends('layouts.docente')
@section ('content')
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            {{-- <h5><a href="{{asset('GestorMSA/Almacen')}}">Almacen</a>/
                <a href="{{asset('GestorMSA/Usuarios')}}">Usuarios</a>/Modificar
            </h5> --}}
			<h3>Editar Usuario: {{$usuario->name}}</h3>
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

	
			

<form method="POST" action="/DocenteSCH/Usuarios/{{$usuario->id}}" enctype="multipart/form-data">
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nombre Apellido" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$usuario->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--nuevos dtos  -->
                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" placeholder="Nombre Apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{$usuario->apellido}}" required autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->
                    
                        <!--  -->
                        <!--  -->
                       <!--  <div class="form-group">
                                            <label for="inputGenero" class="col-sm-offset-2 col-sm-3 control-label">Género</label>
                                            <div class="col-sm-4">
                                              <select>
                                                <option value="Masculino">M</option>
                                                <option value="Femenino" >F</option>
                                              </select>
                                            </div>
                                        </div> -->
                        <!--  -->
        
                        <!--  -->
                        
                        
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" placeholder="Direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{$usuario->direccion}}" required autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" placeholder="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{$usuario->telefono}}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" placeholder="celular" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{$usuario->celular}}" required autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario') }}</label>

                            <div class="col-md-6">
                                <!-- <div class="col-sm-4"> -->
                                              <select name="TI" class="form-control">
                                                {{-- <option value="1">Administrador</option> --}}
                                                <option value="2" >Docente</option>
                                                <option value="3" >Estudiante</option> 
                                              </select>
                                            <!-- </div> -->

                                @if ($errors->has('genero'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('genero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--  -->
                        
                        

                        <!--fin ndatos  -->

                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm. Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!--new datos  -->
                        <div class="form-group row">
                                      {{-- <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label> --}}
                                      <div class="col-md-6">
                                      <label class="switch">
                                            {{-- <input type="checkbox" name="estado" required value="{{$usuario->estado}}" readonly="readonly" /> --}}
                                            <input type="hidden" name="estado" required value="0" readonly="readonly" />
                                            <div class="switch-btn"></div>
                                          </label>
                                        </div>                 
                        </div>
                        <!--estado  -->
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