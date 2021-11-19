
    {{ Form::open(['url' => 'UnidadSCH/Reportes/Actividades', 'method' => 'POST']) }}
    {{ Form::token() }}
    <div class="col-md-8" style="padding-right: 0px;">
        <div class="form-group">
            <div class="col-md-3">
                <label for="curso" class="col-form-label text-md-right">{{ __('Curso') }}</label>
            </div>
            <div class="col-md-9">
                <select name="curso" class="form-control">
                    @foreach ($paralelos as $paralelo)
                        <option value="{{ $paralelo->id }}">{{ $paralelo->nivel->nombreN }} -
                            {{ $paralelo->nombreP }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left: 0px">
        <button type="submit" class="btn btn-success">Alumnos</button>
    </div>

{{ Form::close() }}
