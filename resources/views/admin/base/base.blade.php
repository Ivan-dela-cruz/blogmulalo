<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('titulo')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contactos</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{asset('admin/dist/img/logomulalo.png')}}" alt="AdminLTE Logo" class=""
                 style="opacity: .8; width: 80%;">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link @yield('principal')">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Principal
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link @yield('admiPrincipal')">
                            <i class="nav-icon fa fa-th text-info"></i>
                            <p>
                                Adminitración
                                <i class="right fa fa-angle-left"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('representative.create')}}" class="nav-link @yield('admiDirectiva')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Directiva</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('period.index')}}" class="nav-link @yield('adminPeriodo')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Período administrativo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link @yield('admiUser')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('noti')">
                            <i class="nav-icon fa fa-pie-chart text-info"></i>
                            <p>
                                Noticias
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('posts.create') }}" class="nav-link @yield('notiNueva')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Nueva</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link @yield('notiCategoria')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('tag.index')}}" class="nav-link @yield('notiEtiqueta')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Etiquetas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('post-published')}}" class="nav-link @yield('notiPublicadas')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Publicadas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('post-draft')}}" class="nav-link @yield('notiBorrador')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Borrador</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('plani')">
                            <i class="nav-icon fa fa-tree text-info"></i>
                            <p>
                                Planificaciones
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('planification.create')}}" class="nav-link @yield('planiNueva')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Nueva</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoryplanification.index')}}"
                                   class="nav-link @yield('planiCategoria')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Caterogias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('plan-published')}}" class="nav-link @yield('planiPublicadas')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Publicadas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('plan-draft')}}" class="nav-link @yield('planiBorrador')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Borrador</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/advanced.html" class="nav-link @yield('planiConvenios')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Conenios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link @yield('planiProyectos')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Proyectos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('servi')">
                            <i class="nav-icon fa fa-calendar text-info"></i>
                            <p>
                                Servicios
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('services.create') }}" class="nav-link @yield('serviNuevo')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Nuevo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoryservice.index')}}" class="nav-link @yield('serviCategori')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('service-published')}}" class="nav-link @yield('serviPublicadas')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Publicadas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('service-draft')}}" class="nav-link @yield('serviBorrador')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Borrador</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('turi')">
                            <i class="nav-icon fa fa-edit text-info"></i>
                            <p>
                                Turismo
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('comen')">
                            <i class="nav-icon fa fa-envelope-o text-info"></i>
                            <p>
                                Convocatoria
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('categoria_convocatoria.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('reunion.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Reuniones</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('convocatoria.create')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Convocatorias</p>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="{{route('reunion.index')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Archivos reuniones</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link @yield('soli')">
                            <i class="nav-icon fa fa-book text-info"></i>
                            <p>
                                Solicitudes
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link @yield('soliRevisar')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Revisar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link @yield('soliArchivos')">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Archivos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('infor')">
                            <i class="nav-icon fa fa-desktop text-info"></i>
                            <p>Información</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fa fa-power-off text-info"></i>
                            <p>{{ __('Salir') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('mainEncabezado')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('niveles')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-sm-none d-md-block">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->

<!-- Bootstrap -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jVectorMap -->
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<!-- ChartJS 1.0.2 -->
<script src="{{asset('admin/plugins/chartjs-old/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>

{{-- ajax para las etiquetas--}}
@yield('scripts')


</body>
</html>
