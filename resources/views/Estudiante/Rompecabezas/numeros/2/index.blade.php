@extends('layouts.user')
<link rel="stylesheet" href="{{asset('css/botones.css')}}">
	<link rel="stylesheet" href="{{asset('css/nuDos.css')}}">
	{{-- <script src="{{asset('js/arch.js')}}"></script> --}}
@section('content')
{{-- llenar --}}


<div id='contentS' align='center' class="row">
    <div id="titulo">ROMPECABEZAS</div>
    <iframe src="{{ URL::to('/games/numeros/numero2/index.html') }}" width="100%" height="700" allowFullScreen="true"></iframe>


    <div class="d-none">
        {!! Form::open(['route' => ['Index.Estudiante.store', 'Numero2']]) !!}
        <div class="form-group">
            {{ Form::label('name', 'Número 2') }}
            {{ Form::text('name', 'Número 2', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('idjugador', 'Jugador') }}
            {{ Form::number('idjugador', Auth::user()->id, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('jugador', 'Jugador') }}
            {{ Form::text('jugador', Auth::user()->name, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('ok', '%') }}
            {{ Form::text('ok', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('acciones', 'Acciones') }}
            {{ Form::text('acciones', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('aciertos', 'Aciertos') }}
            {{ Form::text('aciertos', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('tiempo', 'Tiempo') }}
            {{ Form::text('tiempo', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Guardar Reporte', ['class' => 'btn btn-primary']) }}
        </div>
        {!! Form::close() !!}
    </div>

    <div align="center">
        <a href="{{ route('NDIndex') }}" class="btn btn-warning">Vover a Jugar</a>
        <button class="btn btn-primary btnGuardar" onclick="guardarReporteGame1();" disabled="">Guardar Reporte</button>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-8">
            @if (session()->has('message'))
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {!! session()->get('message') !!}
                    </strong>
                </div>
            @endif
        </div>
    </div>
</div>






{{-- <div id='contentS' align='center' class="row">
    <div id="titulo">ROMPECABEZAS</div>
  	<div id='conf'>
			<span>Nro de piezas:</span>
			<select id='piezas'>
				<option value='9'>9</option>
			</select>
			<div class="btn-group">
			  <i class="fa fa-bomb" aria-hidden="true"><input type='button' class="btn btn-outline-secondary btn-sm" id='barajar' value='Barajar' /></i>
			  <a href="" data-target="#modal-delete-{{ Auth::user()->id }}" data-toggle="modal"><button type="button" class="btn btn-outline-warning btn-sm"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Pista</button></a>
			  @include('Estudiante.Rompecabezas.numeros.2.modal')
			</div>
      		<div><p>Pulsa en un cuadro y luego en otro
      		para intercambiar sus posiciones!!</p></div>
      		<div>
      			<div id="reloj">0 : 00 : 00 : 00</div>
      			<div>
      			<p >Registrar luego de resolver...
      			<a href="{{URL::action('EstRompController@verObjND',$c)}}"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-edit"></i>Registrar Tiempo</button></a></p>
      			</div>
      		</div>
	</div>
</div>  --}}
{{--  --}}
@stop
