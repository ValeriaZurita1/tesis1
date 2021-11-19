@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('css/botones.css')}}">
	<link rel="stylesheet" href="{{asset('css/arch.css')}}">
@section('content')
<div id='contentS' align='center' class="row">

    <iframe src="{{ URL::to('/games/familia/mama/index.html') }}" width="100%" height="700" allowFullScreen="true"></iframe>

    <div class="d-none">
        {!! Form::open(['route' => ['Index.store', 'Mama']]) !!}
        <div class="form-group">
            {{ Form::label('name', 'Mamá') }}
            {{ Form::text('name', 'Mamá', ['class' => 'form-control']) }}
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
        <a href="{{ route('MaIndex') }}" class="btn btn-warning">Vover a Jugar</a>
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
@stop
