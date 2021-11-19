@extends('layouts.admin')
{{-- <link rel="stylesheet" href="{{asset('css/arch.css')}}"> --}}
{{-- <script src="{{asset('js/arch.js')}}"></script> --}}
{{-- <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}" > --}}
	{{-- <link rel="stylesheet" href="{{asset('css/arch.css')}}"> --}}
	{{-- <script src="{{asset('jquery.min.js')}}"></script> --}}
	{{-- <script src="{{asset('js/arch.js')}}"></script> --}}
	{{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}
		<link rel="stylesheet" href="{{asset('css/main.css')}}">

@section('content')
{{-- llenar --}}
<svg width="600" height="500" id="entorno">
		<g id="fondo"><image xlink:href="{{asset('img/romp/a/e.png')}}" width="400" height="400" x="200" y="100"></g>
	<g class="padre" id="0"><image xlink:href="{{asset('img/romp/a/1e1.png')}}" class="movil"></g>
	<g class="padre" id="1"><image xlink:href="{{asset('img/romp/a/1e2.png')}}" class="movil"></g>
	<g class="padre" id="2"><image xlink:href="{{asset('img/romp/a/1e3.png')}}" class="movil"></g>
	<g class="padre" id="3"><image xlink:href="{{asset('img/romp/a/2e1.png')}}" class="movil"></g>
	<g class="padre" id="4"><image xlink:href="{{asset('img/romp/a/2e2.png')}}" class="movil"></g>
	<g class="padre" id="5"><image xlink:href="{{asset('img/romp/a/2e3.png')}}" class="movil"></g>
	<g class="padre" id="6"><image xlink:href="{{asset('img/romp/a/3e1.png')}}" class="movil"></g>
	<g class="padre" id="7"><image xlink:href="{{asset('img/romp/a/3e2.png')}}" class="movil"></g>
	<g class="padre" id="8"><image xlink:href="{{asset('img/romp/a/3e3.png')}}" class="movil"></g>
</svg>
<audio id="win" src="{{asset('media/win.mp3')}}"></audio>
	
<!--  -->
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

{{--  --}}
@stop