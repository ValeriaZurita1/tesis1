<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ Auth::user()->id }}">
{{Form::Open(array('action'=>array('DocUserController@destroy', Auth::user()->id),'method'=>'delete'))}}
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Pista Rompecabezas</h4>
	</div>
	<div class="modal-body">
		<p class="text-muted text-center"><img src="{{asset('/img/familia/primo.png')}}" style="width: 350px; height: 180px" class="img-thumbnail"></p>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>

	</div>
</div>
{{Form::Close()}}	

</div>