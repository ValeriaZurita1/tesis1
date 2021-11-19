<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>UNIDAD EDUCATIVA DE SORDOS DE CHIMBORAZO</title>
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/proyectos.css">
    <link rel="stylesheet" href="css/TresCol.css">


   <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/images.jpg" >
</head>
<body>
<header class="mobile">
  <div class="row">

         <div class="col full" >
            <div class="logo" style=" position: relative;"  >                    
                  <a href="{{ url('/') }}"><img alt="" src="img/images.jpg" style="width: 50px; height: 40px"></a>
            </div>
      <nav id="nav-wrap">
        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Mostrar navegación </a>
                <a class="mobile-btn" href="#" title="Hide navigation">Ocultar navegación</a>
        <ul id="menu">
          <li><a href="{{ url('/') }}">Principal</a></li>
          <li><a href="{{ url('/informacion') }}">Información</a></li>
          <li><a href="">Cursos</a>
            <ul>
              <li><a href="{{ route('InicialD') }}">Inicial II</a></li>
              <li><a href="{{ url('Cursos/InicialD') }}">Jardin</a></li>
              <li><a href="{{ route('Cursos/InicialD') }}">Segundo de basica</a></li>
              <li><a href="{{ url('/Cursos/InicialD') }}">Tercero de basica</a></li>
              <li><a href="{{ url('/Cursos/InicialD') }}">Cuarto de basica</a></li>
              <li><a href="{{ url('/Cursos/InicialD') }}">Quinto de basica</a></li>
              <li><a href="{{ url('/Cursos/InicialD') }}">Sexto de basica</a></li>
            </ul>  
          </li>
          <li><a href="{{ url('/UnidadEduc') }}">Unidad Educativa</a></li>
          <li><a href="{{ url('/Docentes') }}">Docentes</a></li>
          <li><a href="{{url('/login')}}">Login</a></li>
          <li><a href="{{url('/register')}}">Registrarse</a></li>
        </ul>
      </nav>
      </div>
      </div>
</header>
{{-- @yield('content') --}}
<!--  -->
<!-- Acerca de Section
   ================================================== 062c47-->
<section id="nosotros" style="background: #0f8488">
  @yield('content')
</section> <!-- acerca Section End-->

<!--  -->

<footer>

      <div class="row">

         <div class="col g-7">
            <ul class="copyright">
               <li>&copy; 2014 Kreative</li>
               <li>Design by <a href="http://www.styleshout.com/" title="Styleshout">Styleshout</a></li>               
            </ul>
         </div>

         <div class="col g-5 pull-right">
            <ul class="social-links">
               <li><a href="#"><i class="icon-facebook"></i></a></li>
               <li><a href="#"><i class="icon-twitter"></i></a></li>
               <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
               <li><a href="#"><i class="icon-skype"></i></a></li>         
            </ul>
         </div>
      </div>
</footer>  <!-- Footer End-->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/app.js"></script>
   <script src="js/scrollspy.js"></script>
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/jquery.reveal.js"></script>
   <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
   <script src="js/gmaps.js"></script>
   <script src="js/init.js"></script>
   <script src="js/smoothscrolling.js"></script>
</body>
</html>