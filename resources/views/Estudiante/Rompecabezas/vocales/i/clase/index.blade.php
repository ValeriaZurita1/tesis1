@extends ('layouts.user')
<link rel="stylesheet" href="{{ asset('css/vLIhover.css') }}">
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-6 cl-lg-12 center">
                <h1> Clase letra I </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-6 center">
                <iframe width="600" height="400" src="https://www.youtube.com/embed/3STFhezDW4w"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="row button">
            <a class="center" href="{{ url('/EstudianteSCH/Vocales/I') }}"><button type="button"
                    class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i> Siguiente</button></a>
        </div>
    </div>

    {{-- <div class="container">
		<center><h1>Clase Letra I</h1></center>
		<center>
		<video width="50%" height="50%" controls>
        <source src="{{asset('video/ayuda.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
      </video></center>
      <a href="{{ url('/EstudianteSCH/Vocales/I') }}"><button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Siguiente</button></a>
	</div> --}}
@endsection
