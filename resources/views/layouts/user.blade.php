<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UNIDAD EDUCATIVA DE SORDOS DE CHIMBORAZO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!--bootstrap 4  -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <!-- <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}"> -->
    <link rel="shortcut icon" href="{{asset('img/images.jpg')}}" >

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UE</b>SCH</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>UNIDAD EDUCATIVA SCH</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <!-- inicio -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--  -->
                  <img src="{{asset('img/perfil/'.Auth::user()->foto)}}" class="user-image" alt="User Image">
                  <!--  -->
                  <small class="bg-green">Online</small>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <img src="{{asset('img/perfil/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
                    {{-- <p class="text-muted text-center"><small>{{auth::user()->id}}</small></p>
                     --}}<p>

                      {{ Auth::user()->email }}
                      <small>www.youtube.com/user/bartolomeo211</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- perfil -->
                    <div class="pull-left">
                        <a href="" class="btn btn-default btn-flat" data-target="#modal-default" data-toggle="modal"><i class="fa fa-user"></i> Perfil</a>

                        <!-- modal perfil -->

                        <!--  -->
                    </div>
                    <!-- perfil -->
                    <div class="pull-right">
                      <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>
                     </div>
                      <!--  -->

                      <!--  -->
                  </li>
                </ul>
              </li>
              <!-- fin sesion -->
            </ul>
          </div>

        </nav>
      </header>
      <!--modal perfil  -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="box box-primary">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Perfil de usuario</h4>
              </div>
              <div class="modal-body">
                <!-- Imagen de perfil -->
                  <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{{asset('img/perfil/'.Auth::user()->foto)}}" alt="User profile picture">
                                  <h3 class="profile-username text-center">{{auth::user()-> name}}</h3>
                                  <p class="text-muted text-center">{{auth::user()->email}}</p>
                                  <p class="text-muted text-center">{{auth::user()->direccion}}</p>
                                  <p class="text-muted text-center">ESTUDIANTE</p>
                  </div><!-- /.box-body -->
              </div>
                <div class="modal-footer">

                  {{--  --}}
                  {{-- <div class="pull-left">
                       <a href="{{URL::action('PerfilUController@edit',auth::user()->id)}}"><button type="button" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Editar</button></a>
                    </div> --}}
                  {{--  --}}
                  <div class="pull-right">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  {{--  --}}
                </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      <!-- fin modal -->
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/perfil/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- -->
      {{-- <form action="{{asset('GestorMSA/BusquedaA')}}" method="get" class="sidebar-form"> --}}
        {{-- {!! Form::open(['url'=>'GestorUsuario/BusquedaA', 'method'=>'GET', 'class'=>'sidebar-form', 'role'=>'buscarAdm']) !!}
        <div class="input-group">
          <input type="text" name="buscarAdm" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
        {!! Form::close() !!} --}}
      {{-- </form> --}}
      <!-- -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Unidad</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                {{-- <p class="text-muted text-center"><small>{{auth::user()->id}}</small></p> --}}
                <li><a href="{{URL::action('EstAlumnosController@verList',auth::user()->id)}}"><i class="fa fa-circle-o"></i> Curso</a></li>
                 <li><a href="{{asset('EstudianteSCH/Asistencia')}}"><i class="fa fa-circle-o"></i> Asistencia</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Actividades</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{asset('/EstudianteSCH/ControlActividad/vocales')}}"><i class="fa fa-circle-o"></i> Vocales</a></li>
                <li><a href="{{asset('/EstudianteSCH/ControlActividad/numeros')}}"><i class="fa fa-circle-o"></i> Numeros</a></li>
                <li><a href="{{asset('/EstudianteSCH/ControlActividad/familia')}}"><i class="fa fa-circle-o"></i> Familia</a></li>
                <li><a href="{{asset('/EstudianteSCH/ControlActividad/animales')}}"><i class="fa fa-circle-o"></i> Animales</a></li>
                <li><a href="{{asset('EstudianteSCH/ControlActividad')}}"><i class="fa fa-circle-o"></i> Control Actividad</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
             <!-- <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li> -->

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema UESCH</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                                  <!--Contenido-->
                              @yield('content')

                                  <!--Fin Contenido-->
                           </div>
                        </div>

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2019-2024 <a href="http://www.maquetaespoch.blogspot.com">Grupo Inv. MSA3D</a>.</strong> All rights reserved.
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- bootstrap 4 -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('js/games.js')}}"></script>

  </body>
</html>
