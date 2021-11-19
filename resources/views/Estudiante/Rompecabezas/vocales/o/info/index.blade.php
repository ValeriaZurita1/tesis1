@extends ('layouts.user')
<link rel="stylesheet" href="{{asset('css/vLOhover.css')}}">
<link rel="stylesheet" href="{{asset('css/botones.css')}}">
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Vocals/O.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p> Es la decimosexta letra del alfabeto español, decimoquinta del alfabeto latino básico y la cuarta vocal. </p>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="col one-sixth"> --}}

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Vocals/oreja.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Letra O </h4>
                    <p> Es la decimosexta letra del alfabeto español, decimoquinta del alfabeto latino básico y la cuarta vocal. </p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('EstudianteSCH/ControlActividad/vocales/O/video') }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@endsection
