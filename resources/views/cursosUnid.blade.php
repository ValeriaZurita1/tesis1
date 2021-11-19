@extends('layouts.welcome')

@section('content')


<!-- Team Wrap End -->
<div class="row team-wrap">
	<div class="col one-sixth">
          <center>
            <img src="img/inicial2.jpg" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               	<a href="{{ url('CursoU/InicialD') }}" class="small-box-footer">Inicial II <i class="fa fa-arrow-circle-right"></i></a></center>
               {{-- <h5 style="color: #f3f3f3">Misión</h5> --}}
               {{-- <span class="desc"style="color: #f3f3f3">Miembro área diseño y STEAM</span> --}}
            </div>
            {{-- <ul class="member-social"> --}}
               {{-- <li><a>diana.olmedo@espoch.edu.ec</a></li> --}}
            {{-- </ul> --}}
    </div>

<div class="col one-sixth">
          <center>
            <img src="img/jardin.jpg" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               <a href="{{ url('CursoU/Jardin') }}" class="small-box-footer">Jardin<i class="fa fa-arrow-circle-right"></i></a></center>
            </div>            
</div>
<div class="col one-sixth">
          <center>
            <img src="img/2seg.png" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               	<a href="{{ url('CursoU/SegundoB') }}" class="small-box-footer">Segundo de basica <i class="fa fa-arrow-circle-right"></i></a></center>
            </div>            
</div>
<div class="col one-sixth">
          <center>
            <img src="img/tercero.jpg" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               	<a href="{{ url('CursoU/TerceroB') }}" class="small-box-footer">Tercero de basica <i class="fa fa-arrow-circle-right"></i></a></center>
            </div>            
</div>
<div class="col one-sixth">
          <center>
            <img src="img/4to.jpg" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               	<a href="{{ url('CursoU/CuartoB') }}" class="small-box-footer">Cuarto de basica <i class="fa fa-arrow-circle-right"></i></a></center>
            </div>            
</div>
<div class="col one-sixth">
          <center>
            <img src="img/5.jpg" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               	<a href="{{ url('CursoU/QuintoB') }}" class="small-box-footer">Quinto de basica <i class="fa fa-arrow-circle-right"></i></a></center>
            </div>            
</div>
<div class="col one-sixth">
          <center>
            <img src="img/6to.jpg" style="width: 125px; height: 118px" />
          </center>
            <div class="member-name">
               <center>
               	<a href="{{ url('CursoU/SextoB') }}" class="small-box-footer">Sexto de basica <i class="fa fa-arrow-circle-right"></i></a></center>
            </div>            
</div>
         

         

         
         

</div> 
@stop