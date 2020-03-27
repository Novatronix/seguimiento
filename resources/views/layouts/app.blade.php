<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Seguimiento Estudiantil</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ asset('/dist/js/adminlte.js') }}"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container  -->
            <aside class="main-sidebar sidebar-cyan-primary elevation-4 bg-light">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                     
                    <span class="brand-text font-weight-light">Seguimiento Estudiantil</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('dist/img/unitec.png')}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                {{ Auth::user()->name }}
                                <br>
                                <b>Coordinacion</b>
                                <br>
                                    <b> Ingenieria en Informatica</b>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    Alumnos
                                  </a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/alumno') }}">Listado de Alumnos</a>
                                    <a class="dropdown-item" href="{{ url('/alumno/create') }}">Matricular Alumno</a>
                                  </div>
                            </li>
                            <li class="nav-item dropdown">
                               
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="nav-icon fas fa-book"></i>
                                    Clases
                                  </a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('clase') }}">Listado de Clases</a>
                                    <a class="dropdown-item" href="{{ url('/clase/create') }}">Crear Clase</a>
                                  </div>
                            </li>

                            <li class="nav-item dropdown">
                               
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    Periodos Academicos
                                  </a>
                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ url('periodo') }}">Historial de Periodos</a>
                                    <a class="dropdown-item" href="{{ url('/periodo/create') }}">Crear Periodo</a>
                                  </div>
                            </li>

                            <li class="nav-item dropdown">
                               
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="nav-icon fas fa-address-book"></i>
                                    Primer Ingreso
                                  </a>
                                  <div class="dropdown-menu">
                                   
                                    <a class="dropdown-item" href="{{ url('historial') }}">Ver/Actualizar Registro</a>
                                    <a class="dropdown-item" href="{{ url('/historial/create') }}">Crear Nuevo</a>
                                    
                                  </div>
                            </li>
                            <li class="nav-item dropdown">
                               
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="nav-icon fas fa-file-excel"></i>
                                    Reportes
                                  </a>
                                  <div class="dropdown-menu">
                                   
                                    <a class="dropdown-item" href="{{ url('report/alumno') }}">Alumno</a>
                                    <a class="dropdown-item" href="{{ url('report/periodo') }}">Periodo</a>
                                    
                                  </div>
                            </li>

                            <li class="nav-item dropdown">
                               
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="nav-icon fas fa-file-export"></i>
                                    Exportacion PDF
                                  </a>
                                  <div class="dropdown-menu">
                                   
                                    <a class="dropdown-item" href="{{ route('alumnos.pdf') }}">Alumno</a>
                                    <a class="dropdown-item" href="{{ route('historiales.pdf') }}">Historial</a>
                                    
                                  </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('carrera') }}"   
                                    class="{{ Request::path() === 'carrera' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Carrera
                                    </p>
                                </a>
                            </li>

                           

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
          

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>

</html>