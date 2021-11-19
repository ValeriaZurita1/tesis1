@extends ('layouts.user')

    <link rel="stylesheet" href="{{asset('css/botones.css')}}">
@section ('content')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h4> Nombres: {{$user->name}} </h4>
	</div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h4> Apellidos: {{$user->apellido}} </h4>
	</div>
</div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>

            @if ($user->paralelos->count() > 0)
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-bordered table-condensed table-hover">
                  <tr>
                    <th>Curso</th>
                     <th>Paralelo</th>
                    <th>Fecha</th>
                  </tr>
                  <tr>
                  @foreach ($user->paralelos as $paraleloUsuario)
                    <td>{{$paraleloUsuario->paralelo->nivel->nombreN}}</td>
                     <td>{{$paraleloUsuario->paralelo->nombreP}}</td>
                    <td>{{$paraleloUsuario->paralelo->created_at}}</td>
                    {{-- <td> --}}
                        {{-- <a href="" data-target="#modal-delete-{{$usd->idR}}" data-toggle="modal"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-user-times"></i> Eliminar</button></a> --}}
                    {{-- </td> --}}
                  </tr>
                  @endforeach
                </table>
              </div>
            @else
                <p> No existen paralelos asociados al usuario </p>
            @endif
          </div>
        </div>
      </div>

@endsection
