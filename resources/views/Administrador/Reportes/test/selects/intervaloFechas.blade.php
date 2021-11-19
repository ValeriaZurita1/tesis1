
    {{-- {{ Form::open(
        [ 'url' => > array('UnidadSCH/Reportes/Actividades/user', ['idParaleloUsuario' => $paraleloUsuario->id])
        , 'method' => 'POST']) }} --}}
        {{ Form::open(['url' => array('UnidadSCH/Reportes/RendimientoT/user/fechas', $paraleloUsuario->id), 'method' => 'POST']) }}
    {{ Form::token() }}
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <div class="col-md-3">
                <label for="fechaInicio" class="col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>
            </div>
            <input type="hidden" name="idSecact" value="{{$dataTest->id}}">
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
    <div class="col-md-4">
        <button type="submit" class="btn btn-success">Test</button>
    </div>

{{ Form::close() }}
