
    {{-- {{ Form::open(
        [ 'url' => > array('UnidadSCH/Reportes/Actividades/user', ['idParaleloUsuario' => $paraleloUsuario->id])
        , 'method' => 'POST']) }} --}}
    {{ Form::open(['url' => array('UnidadSCH/Asistencia/paralelo/informe', $paraleloUsuario->id), 'method' => 'POST']) }}
    {{ Form::token() }}
    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" style="margin-bottom: 15px; margin-top: 15px">
        <div class="form-group">
            <div class="col-md-3">
                <label for="fechaInicio" class="col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>
            </div>
            {{-- <input type="hidden" name="idSecact" value="{{$dataSecAct->id}}"> --}}
            <div class="col-md-9">
                {{Form::input('date', 'fechaInicio', null, ['class' => 'form-control', 'placeholder' => '2021-01-01'])}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
                <label for="fechaFin" class="col-form-label text-md-right">{{ __('Fecha Fin') }}</label>
            </div>
            <div class="col-md-9">
                {{Form::input('date', 'fechaFin', null, ['class' => 'form-control', 'placeholder' => '2021-01-15'])}}
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top: 25px;">
        <button type="submit" class="btn btn-success">Buscar</button>
    </div>

{{ Form::close() }}
