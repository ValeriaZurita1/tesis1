
    {{-- {{ Form::open(
        [ 'url' => > array('UnidadSCH/Reportes/Actividades/user', ['idParaleloUsuario' => $paraleloUsuario->id])
        , 'method' => 'POST']) }} --}}
        {{ Form::open(['url' => 'EstudianteSCH/Asistencia', 'method' => 'GET']) }}
    {{ Form::token() }}
    <div class="col-md-8" style="padding-right: 0px;">
        <div class="form-group">
            <div class="col-md-3">
                <label for="idParaleloUsuario" class="col-form-label text-md-right">{{ __('Actividades') }}</label>
            </div>

            <div class="col-md-9">
                <select name="idParaleloUsuario" class="form-control">
                    @foreach ($dataParalelos as $paraleloUs)
                        <option value="{{ $paraleloUs->id }}"> {{ $paraleloUs->paralelo->nivel->nombreN}} - {{ $paraleloUs->paralelo->nombreP}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left: 0px">
        <button type="submit" class="btn btn-success">Buscar</button>
    </div>

{{ Form::close() }}

