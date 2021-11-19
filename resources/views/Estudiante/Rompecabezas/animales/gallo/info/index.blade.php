@extends ('layouts.user')
<link rel="stylesheet" href="{{ asset('css/vAGallhover.css') }}">
<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/POLLO.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>El pollo es una ave doméstica. Es el macho de la familia Phasianidae y se distingue por su cresta roja. </p>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="col one-sixth"> --}}

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Animales/Pollo1.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Pollo Lenguaje de Señas </h4>
                    <p>El pollo es una ave doméstica. Es el macho de la familia Phasianidae y se distingue por su cresta roja. </p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('EstudianteSCH/ControlActividad/animales/gallo/video') }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>


    {{-- <div class="container">
		<table>
			<tr>
				<td>
					<div class="col one-sixth">
          <div id="imagen">
          	<div id="info"></div>
          	<p id="headline">Caracteristicas</p>
          	<p id="info3">La A es la vocal más común en la gran mayoría de lenguas, con notables excepciones como en el caso del francés y del inglés, en los que la más común es la E.</p>
          </div>
    </div>
				</td>
				<td>
					<div class="col one-sixth">
          <div id="imagen2">
          	<div id="infoA"></div>
          	<p id="headline1">Letra A minuscula</p>
          	<p id="info4">La A es la vocal más común en la gran mayoría de lenguas, con notables excepciones como en el caso del francés y del inglés, en los que la más común es la E.</p>
          </div>
    </div>
				</td>
				<td>
					<a href="{{ url('EstudianteSCH/ControlActividad/animales/gallo/video') }}"><button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-share" aria-hidden="true"></i> Siguiente</button></a>
				</td>
			</tr>
		</table>


</div> --}}
@endsection
