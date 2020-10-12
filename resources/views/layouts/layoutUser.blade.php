<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    <!-- Favicon -->

    <link href="{{asset('user/img/brand/favicon.png')}}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('user/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('user/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('user/css/argon.css?v=1.0.1')}}" rel="stylesheet">
    <!-- Docs CSS -->
    <link type="text/css" href="{{asset('user/css/docs.min.css')}}" rel="stylesheet">

    <link href="{{asset('user/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('user/css/style.min.css')}}" rel="stylesheet">
    <style type="text/css">
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #929FBA !important;
            }
        }

    </style>

</head>

<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg fixed-top navbar-dark headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="/inicio">
                <img src="{{asset('user/img/logomulalo.png')}}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="/inicio">
                                <img src="{{asset('user/img/logomulalo1.png')}}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-collection d-lg-none"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span>Publicaciones</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="/convocatorias"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-notification-70"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Convocatorias</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Usted puede ver las convocatorias,
                                            para orgarnizar un trabajo efectivo por la comunidad.</p>
                                    </div>
                                </a>
                                <a href="/noticias"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-info rounded-circle text-white">
                                        <i class="ni ni-tv-2"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Noticias</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Enterate de todos los acontecimiento
                                            y sucesos que pasan en el barrio.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span>Servicios</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="#"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-single-copy-04"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Reservaciones</h6>
                                        <p class="description d-none d-md-inline-block mb-0">Estos espacios son tuyos
                                            puedes reservarlos para organizar ferias, exposiciones, etc.</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span>Obras</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="/planificaciones"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                                        <i class="ni ni-folder-17"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="heading text-warning mb-md-1">Planificaciones</h5>
                                        <p class="description d-none d-md-inline-block mb-0">Puedes ver los planes que se construyen
                                            en el barrio por tu beneficio.</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span>La parroquia</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="/autoridades"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-circle-08"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Autoridades </h6>
                                        <p class="description d-none d-md-inline-block mb-0">Mira informacion básica de
                                            las autoridades</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                            <i class="ni ni-ui-04 d-lg-none"></i>
                            <span>Acerca de</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl">
                            <div class="dropdown-menu-inner">
                                <a href="#"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                                        <i class="ni ni-mobile-button"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Contactos </h6>
                                        <p class="description d-none d-md-inline-block mb-0">TELFAX: (032)710-535</p>
                                    </div>
                                </a>
                                <a href="/login"
                                   class="media d-flex align-items-center">
                                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                                        <i class="ni ni-satisfied"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="heading text-primary mb-md-1">Administración </h6>
                                        <p class="description d-none d-md-inline-block mb-0">Opcion solo para administradores</p>
                                    </div>
                                </a>


                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.facebook.com/GADPRMULALO" target="_blank"
                           data-toggle="tooltip" title="Siguenos en Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.youtube.com/results?search_query=parroquia+mulalo+cotopaxi"
                           target="_blank" data-toggle="tooltip" title="Siguenos en Youtube">
                            <i class="fa fa-youtube"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://twitter.com/InfoCotopaxiMul" target="_blank"
                           data-toggle="tooltip" title="Siguenos en Twitter">
                            <i class="fa fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="http://www.cotopaxi.gob.ec/index.php/2015-09-20-01-15-34/secretaria-general/itemlist/search?searchword=mulalo&x=0&y=0&categories=&format=html&t=1544131960595&tpl=search"
                           target="_blank"
                           data-toggle="tooltip" title="Siguenos en Cotopaxi noticias">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="nav-link-inner--text d-lg-none">Noticias</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        @yield('carusel')
    </div>

</header>


<main>

    @yield('contenido')
</main>


<footer class="footer has-cards">
    <div class="container">
        <div class="row row-grid align-items-center my-md">
            <div class="col-lg-6">
                <h3 class="text-primary font-weight-light mb-2">Mulalo</h3>
                <h4 class="mb-0 font-weight-light">Parroquia</h4>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <a target="_blank" href="https://twitter.com/infocotopaximul" class="btn btn-neutral btn-twitter btn-round"
                   data-toggle="tooltip" data-original-title="Follow us">
                    <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="https://www.facebook.com/GADPRMULALO"
                   class="btn btn-neutral btn-facebook btn-round" data-toggle="tooltip" data-original-title="Like us">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a target="_blank" href="https://www.youtube.com/results?search_query=parroquia+mulalo+cotopaxi"
                   class="btn btn-neutral btn-youtube  btn-round" data-toggle="tooltip"
                   data-original-title="Follow us">
                    <i class="fa fa-youtube-play"></i>
                </a>
                <a target="_blank" href="http://www.cotopaxi.gob.ec/index.php/2015-09-20-01-15-34/secretaria-general/itemlist/search?searchword=mulalo&x=0&y=0&categories=&format=html&t=1544131960595&tpl=search"
                   class="btn btn-neutral btn-github btn-round" data-toggle="tooltip"
                   data-original-title="Star on Github">
                    <i class="fa fa-newspaper-o"></i>
                </a>
            </div>
        </div>
        <hr>
        <h6>Gobierno Autónomo Decentralizado de Mulaló</h6><br>
        <div class="row align-items-center justify-content-md-between">

            <div class="col-md-6">

                <div class="copyright">
                    &copy; 2018
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
            <div class="col-md-6">

                <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Acerca
                            de</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"
                           class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Core -->
<script src="{{asset('user/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('user/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('user/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('user/vendor/headroom/headroom.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('user/js/argon.js?v=1.0.1')}}"></script>

<script type="text/javascript" src="{{asset('user/js/mdb.min.js')}}"></script>

<!-- Optional JS -->
<script src="{{asset('user/vendor/onscreen/onscreen.min.js')}}"></script>
<script src="{{asset('user/vendor/nouislider/js/nouislider.min.js')}}"></script>
<script src="{{asset('user/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>

</body>

</html>