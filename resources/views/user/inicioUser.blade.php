@extends('../layouts.layoutUser')

@section('title')
    GAD MULALO
@endsection

@section('carusel')

    <!--Carousel Wrapper-->

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100" style="height: 100vh;" src="{{asset('user/img/mulalo1.jpg')}}"
                     alt="">

                <!-- Mask & flexbox options-->
                <div class="mask d-flex justify-content-center align-items-end">

                    <!-- Content -->
                    <div class="text-center white-text wow fadeIn">
                        <h1 class="text-left display-1 white-text">
                            <h2 class="text-left white-text display-2">GAD PARROQUIAL MULALÓ</h2>
                        </h1>

                        <p>
                            <strong class="text-left white-text display-4"> Trabajando por el desarrollo de nuestra
                                comunidad y el fortalecimiento de
                                nuestros habitantes.</strong>
                        </p>


                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
            <div class="view">
                <img class="d-block w-100" style="height: 100vh;" src="{{asset('user/img/autoridades.jpg')}}"
                     alt="">

                <!-- Mask & flexbox options-->
                <div class="mask d-flex justify-content-center align-items-end">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-left black-text display-2">Siempre trabajando por el bien común</strong>
                        </h1>

                        <p>
                            <strong class="black-text display-4">Autoridades 2014-2019</strong>
                        </p>


                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
            <div class="view">
                <img class="d-block w-100" style="height: 100vh;" src="{{asset('user/img/DSC06660.jpg')}}"
                     alt="">
                <!-- Mask & flexbox options-->
                <div class="mask d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong class="text-center white-text">Mulaló tiene más atractivos</strong>
                        </h1>

                        <p>
                            <strong>Mulaló-Latacunga-Cotopaxi</strong>
                        </p>


                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

    <!--/.Carousel Wrapper-->

@endsection


@section('contenido')

    <div class="container">
        <h1 class="display-3">
            <hr>
            Servicios
            <small class="text-muted">en línea</small>
        </h1>

        <section class="section section-lg pt-lg-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row row-grid">
                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5 text-center">
                                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                            <i class="ni ni-archive-2"></i>
                                        </div>
                                        <h6 class="text-primary text-uppercase">Plantilla de solicitud</h6>
                                        <p class="description mt-3">Usted puede realizar una solicitud, para atenderle
                                            de una forma eficaz.</p>

                                        <a href="https://drive.google.com/file/d/11EpKPKvUwbaGqhGvelAQwxzs_-45fvx6/view?usp=sharing"
                                           class="btn btn-primary mt-4">previsualizar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5 text-center">
                                        <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                            <i class="ni ni-istanbul"></i>
                                        </div>
                                        <h6 class="text-success text-uppercase">Reservaciones</h6>
                                        <p class="description mt-3">Puedes utilizar varios de nuestros lugares
                                            destinados al servicio de la parroquia.</p>

                                        <a href="#" class="btn btn-success mt-4">Reservar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-lift--hover shadow border-0">
                                    <div class="card-body py-5 text-center">
                                        <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                            <i class="ni ni-delivery-fast"></i>
                                        </div>
                                        <h6 class="text-warning text-uppercase">Horarios de recolección</h6>
                                        <p class="description mt-3">Conoce las rutas, dias y horas especificas en las
                                            que pasa el recolector de basura.</p>

                                        <a href="#" class="btn btn-warning mt-4">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h1 class="display-3">Noticias
            <small class="text-muted">recientes</small>
        </h1>

        <section>
            <div class="container">

                <div class="col-lg-12">

                    <div class="card card-lift--hover shadow border-0 mt-3">
                        <div class="row row-grid">
                            <div class="col-lg-3 mt-3 mx-2 mb-2 py-2">
                                <img src="{{asset('user/img/chocolate.jpg')}}" alt="Raised image"
                                     class="img-fluid rounded shadow-lg">
                                <mark class="small">Aldiaonline</mark>
                                <small class="small">25/09/2018</small>
                            </div>
                            <div class="col-lg-8 mt-3 mx-2 mb-2 py-2">

                                <h6 class="text-primary text-uppercase">MULALÓ TIENE MICRO EMPRESARIOS QUE NO DESMAYAN Y
                                    SE FORTALECEN CON EL TIEMPO </h6>
                                <p class="small">Hace más de una año, el Cotopaxi puso a prueba a muchas personas y
                                    sectores,
                                    uno de ellos Mulaló, parroquia más cercana y en zona de riesgo en el caso de una
                                    eventual
                                    erupción del coloso que tienen como vecino. </p>

                                <a href="#" class="btn btn-primary btn-sm mt-1">Leer más</a>
                            </div>
                        </div>
                    </div>

                    <div class="card card-lift--hover shadow border-0 mt-3">
                        <div class="row row-grid">
                            <div class="col-lg-3 mt-3 mx-2 mb-2 py-2">
                                <img src="{{asset('user/img/obra.jpg')}}" alt="Raised image"
                                     class="img-fluid rounded shadow-lg">
                                <mark class="small">LaGaceta</mark>
                                <small class="small">17/11/2018</small>
                            </div>
                            <div class="col-lg-8 mt-2 py-2">

                                <h6 class="text-primary text-uppercase">LA GACETA (Cotopaxi) Lluvias caídas en Mulaló
                                    afectaron vías en la parroquia</h6>
                                <p class="small">Varios minutos de lluvias bastaron para afectar gravemente a varias
                                    vías de la parroquia de Mulaló,
                                    producto de ello el Presidente parroquial solicitó el apoyo de los Gobiernos
                                    Provinciales de Cotopaxi y del Municipio
                                    para arreglar las arterias viales de la zona y permitir que los ciudadanos puedan
                                    transitar con facilidad por el sector. </p>

                                <a href="#" class="btn btn-primary btn-sm mt-1">Leer más</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    </div>
@endsection