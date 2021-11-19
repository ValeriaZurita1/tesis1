<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-foto-{{$usd->id}}">
{{Form::Open(array('action'=>array('AdminUserController@destroy',$usd->id),'method'=>'delete'))}}
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">X</span>
			
		</button>
		<h4 class="modal-title">Ver Perfil</h4>
	</div>
	<div class="modal-body">
		
		
				<!--  -->
				<div class="box-body box-profile">
                      {{-- <img class="profile-user-img img-responsive img-circle" src="{{asset('imagenes/perfil/'.$usd->foto)}}" alt="User profile picture"> --}}
                      <h3 class="profile-username text-center"> {{$usd->name}}</h3>
                      <p class="text-muted text-center">{{$usd->email}}</p>
                      <p class="text-muted text-center">{{auth::user()->direccion}}</p>
                      {{-- <p class="text-muted text-center">{{auth::user()->fechaNac}}</p> --}}
                      {{-- <p class="text-muted text-center">{{auth::user()->ciudad}} - {{auth::user()->pais}}</p> --}}
                                  <p class="text-muted text-center">Software Developer</p>
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