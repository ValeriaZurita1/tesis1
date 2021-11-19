@extends ('layouts.admin')
<script src="{{asset('js/loader.js')}}"></script>
@section ('content')
	<div class="container">
		{{-- <center><img style="height: 250px; width: 450px" src="{{asset('404Error.jpg')}}"></center> --}}
		<div id="piechart" style="width: 900px; height: 500px;"></div>
	</div>
@push ('scripts')
<script>
 google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tiempo', 'Usuarios'],
            @foreach ($asisR as $pastels)
              ['{{ $pastels->tiempo}}', {{ $pastels->n_Us}}],
            @endforeach
        ]);
        var options = {
          title: 'Actividades Rompecabezas'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
</script>
@endpush 
@endsection