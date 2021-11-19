@extends('layouts.welcome')
<link rel="stylesheet" href="{{asset('css/cuerpInI.css')}}">

@section('content')
<div class="row team-wrap">
<div class="container">
  <div class="sidebar1">
  	<div class="box-body table-responsive no-padding">
  	<table width="75%" class="table table-striped table-bordered table-condensed table-hover">
  		<tr>
  			<td>
  			<div class="col-one-fourth">
          		<center>
            	<img src="{{asset('img/flecha.jpg')}}" style="width: 180px; height: 118px" />
          		</center>
            <div class="member-name">
               <center>
               <h5 style="color: #f3f3f3">Misión</h5></center>
            </div>
    		</div>
  			</td>
  		</tr>
  		<tr>
  			<td>
  				<div class="col-one-fourth">
          			<center>
            		<img src="{{asset('img/flecha.jpg')}}" style="width: 180px; height: 118px" />
          			</center>
            	<div class="member-name">
               		<center>
               		<h5 style="color: #f3f3f3">Misión</h5></center>
            	</div>
    			</div>
  			</td>
  		</tr>
  	</table>
  	</div>
  	
    
    
    	
  </div><!-- end .sidebar1 -->
<div class="content">
<div class="box-body table-responsive no-padding">
  	<table width="75%" class="table table-striped table-bordered table-condensed table-hover">
  		<tr>
  			<td colspan="3" WIDTH="50" HEIGHT="280">
  			<center style="color:black"><h2>JARDIN</h2></center>
  			<P style="color:black">El creciente interés social por la educación inicial, reflejado por las administraciones educativas en los últimos años, parece haber impulsado la adopción de una serie de programas que están teniendo como consecuencia la progresiva incorporación a los sistemas de atención infantil de grupos de niños y niñas en edades cada vez más próximas al primer año de vida.</P>
  			<p style="color:black">Los factores que pueden haber dado lugar a este interés, que significan un adelanto en la tradicional vertiente asistencial que aún predomina en algunos programas de atención infantil, provienen de distintos campos, producen consecuencias múltiples y actúan en interrelación para producir nuevos resultados.</p>
			<p style="color:black">Por una parte, los avances en el conocimiento sobre el desarrollo neuronal y de las capacidades cognoscitivas de los seres humanos, que recomiendan una atención temprana que favorezca el mejor y mayor aprovechamiento de los mismos.</p>
			</td>
  		</tr>
  		<tr>
  			<td width="110">
  				<div class="col-one-fourth">
          		<center>
            	<img src="{{asset('img/flecha.jpg')}}" style="width: 180px; height: 118px" />
          		</center>
	            <div class="member-name">
	               <center>
	               <h5 style="color: #f3f3f3">Misión</h5></center>
	            </div>
	    		</div>
  			</td>
  			<td></td>
  			<td width="110">
  				<div class="col-one-fourth">
          			<center>
            		<img src="{{asset('img/flecha.jpg')}}" style="width: 180px; height: 118px" />
          			</center>
            	<div class="member-name">
               		<center>
               		<h5 style="color: #f3f3f3">Misión</h5></center>
            	</div>
    			</div>
  			</td>
  		</tr>
  	</table>
</div>

    <!-- end .content --></div>
<div class="sidebar2">
	<div class="box-body table-responsive no-padding">
  	<table class="table table-striped table-bordered table-condensed table-hover">
  		<tr>
  			<td>
  			<div class="col-one-fourth">
          		<center>
            	<img src="{{asset('img/flecha.jpg')}}" style="width: 480px; height: 118px" />
          		</center>
            <div class="member-name">
               <center>
               <h5 style="color: #f3f3f3">Misión</h5></center>
            </div>
    		</div>
  			</td>
  		</tr>
  		<tr>
  			<td>
  				<div class="col-one-fourth">
          			<center>
            		<img src="{{asset('img/flecha.jpg')}}" style="width: 480px; height: 118px" />
          			</center>
            	<div class="member-name">
               		<center>
               		<h5 style="color: #f3f3f3">Misión</h5></center>
            	</div>
    			</div>
  			</td>
  		</tr>
  	</table>
  	</div>

</div>  <!-- end .container -->

</div> 

@stop