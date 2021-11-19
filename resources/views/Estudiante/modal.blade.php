<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{Auth::user()->id}}">
{{-- {{Form::Open(array('action'=>array('AdminUserController@destroy',$usd->id),'method'=>'delete'))}} --}}
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Guia de Ayuda</h4>
	</div>
	<div class="modal-body">
		{{-- <p>Confirme si desea Eliminar Usuario</p> --}}
		<video width="100%" height="50%" controls>
        <source src="{{asset('video/ayuda.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
      </video>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		{{-- <button type="submit" class="btn btn-primary">Confirmar</button> --}}
	</div>

	</div>
</div>
{{-- {{Form::Close()}}	 --}}

</div>