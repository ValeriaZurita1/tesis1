@extends ('layouts.user')
<link rel="stylesheet" href="{{ asset('css/vFPrihover.css') }}">
<link rel="stylesheet" href="{{ asset('css/botones.css') }}">
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Familia/hijo1.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Caracteristicas </h4>
                    <p>Cuando la noción se aplica respecto a un individuo, un primo de éste será el hijo de su tío o de su
                        tía. Supongamos que un hombre llamado Juan tiene un tío que se llama Martín quien, a su vez, tiene
                        un hijo llamado Eduardo. Juan y Eduardo, por lo tanto, son primos.</p>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="col one-sixth"> --}}

                <div class="row">
                    <img class="imagen" src="{{ asset('/img/resources/Familia/Hijo.jpg') }}" alt="">
                </div>
                <div class="row">
                    <h4 class="title"> Primo Lenguaje de Señas </h4>
                    <p>Cuando la noción se aplica respecto a un individuo, un primo de éste será el hijo de su tío o de su
                        tía. Supongamos que un hombre llamado Juan tiene un tío que se llama Martín quien, a su vez, tiene
                        un hijo llamado Eduardo. Juan y Eduardo, por lo tanto, son primos.</p>
                </div>
            </div>

        </div>
        <div class="row button">
            <div class="col-md-12 col-lg-12 col-xs-6 col-s-6 center">
                <a href="{{ url('EstudianteSCH/ControlActividad/familia/primo/video') }}"><button type="button"
                        class="btn btn-primary btn-lg"><i class="fa fa-share" aria-hidden="true"></i>
                        Siguiente</button></a>
            </div>
        </div>
    </div>
@endsection
