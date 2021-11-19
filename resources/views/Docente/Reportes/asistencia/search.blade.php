{!! Form::open(array('url'=>'UnidadSCH/Reportes/lista', 'method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-group">
	
	<!--  -->
	<div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>
                <tr> 
                <td>
                  <input type="text" class="form-control" name="FechaInicio" placeholder="AA-MM-DD..."value="{{$FechaInicio}}">
              	</td>
                <td>
                <input type="text" class="form-control" name="FechaFin" placeholder="AA-MM-DD..." value="{{$FechaFin}}">
            	</td>
            	<td>
            		
            		{{-- <a href="{{URL::action('pdfRepAppController@buscar',[$FechaInicio,$FechaFin])}}"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-image-o"></i> buscar2</button></a> --}}
            		<button type="submit" class="btn btn-primary" target="blank">Generar </button>
            	</td>
                </tr>           
              </table>
            </div>
	<!--  -->
		
	
</div>
{{Form::close()}}
