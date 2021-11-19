@extends ('layouts.user')
@section ('content')

    @isset($DesT)
    <div class="container">
		<center> <h2> Test: {{$test->desTest}} </h2></center>
		<p>Su Nota es: <h2> {{$DesT->notaDes}}</h2></p>
	</div>
    @endisset
    @empty($DesT)
        <div class="container">
            <p> No existen datos del tes </p>
        </div>
    @endempty

@endsection
