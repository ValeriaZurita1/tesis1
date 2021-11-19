<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-foto-{{$asisR->id='1'}}">
{!!Form::open(array('url'=>'DocenteSCH/Reportes/lista','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                        @csrf
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Buscar</h4>
	</div>
	<div class="modal-body">
		
		
				<!--  -->
				<div class="box-body box-profile">
                      {{--  --}}
                      <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th><i class="fa fa-cogs"></i> Opciones </th>
                </tr>
                <tr> 
                <td>
                  <input id="FechaInicio" type="date" title="Fecha de inicio de busqueda" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="AAAA-MM-DD" class="form-control{{ $errors->has('FechaInicio') ? ' is-invalid' : '' }}" name="FechaInicio"  required autofocus>
              	</td>
                <td>
                <input id="FechaFin" type="date" title="Fecha de Cierre de la busqueda" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" placeholder="AAAA-MM-DD" class="form-control{{ $errors->has('FechaFin') ? ' is-invalid' : '' }}" name="FechaFin" required autofocus>
            	</td>
            	<td>
            		
            		{{-- <a href="{{URL::action('pdfRepAppController@buscar',[$FechaInicio,$FechaFin])}}"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-image-o"></i> buscar2</button></a> --}}
            		<button type="submit" class="btn btn-primary">Buscar <i class="fa fa-search"></i></button>
            	</td>
                </tr>           
              </table>
            </div>
                      
                  </div>
				<!--  -->
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		
	</div>

	</div>
</div>
{{Form::Close()}}	

</div>