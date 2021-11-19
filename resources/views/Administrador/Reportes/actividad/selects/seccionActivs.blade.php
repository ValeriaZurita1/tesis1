
    {{-- {{ Form::open(
        [ 'url' => > array('UnidadSCH/Reportes/Actividades/user', ['idParaleloUsuario' => $paraleloUsuario->id])
        , 'method' => 'POST']) }} --}}
        {{ Form::open(['url' => array('UnidadSCH/Reportes/Actividades/user', $paraleloUsuario->id), 'method' => 'POST']) }}
    {{ Form::token() }}
    <div class="col-md-8" style="padding-right: 0px;">
        <div class="form-group">
            <div class="col-md-3">
                <label for="idSecact" class="col-form-label text-md-right">{{ __('Actividades') }}</label>
            </div>

            <div class="col-md-9">
                <select name="idSecact" class="form-control">
                    @foreach ($seccionActivs as $secActiv)
                        <option value="{{ $secActiv->id }}">{{ $secActiv->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left: 0px">
        <button type="submit" class="btn btn-success">Actividades</button>
    </div>

{{ Form::close() }}
