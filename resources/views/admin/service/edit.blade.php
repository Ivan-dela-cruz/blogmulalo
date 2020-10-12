@extends('admin.base.base')
@section('titulo')
    Servicios
@endsection
@section('servi')
    active
@endsection

@section('serviPublicadas')
    active
@endsection
@section('username')
    Auth
@endsection
@section('mainEncabezado')
    Servicios
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Servicios</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Publicadas</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Editar servicio</h3>
                            <div class="card-tools pull-right">
                                <div class="input-group input-group-sm pull-right" style="width: 80px;">
                                    <div class="input-group-alternative">
                                        <a href="{{ route('service-published') }}"
                                           class="btn btn-info btn-sm mx-2">
                                            <i class="fa fa-backward nav-icon"></i>
                                            Salir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-lift--hover shadow border-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-11 mx-3">
                                {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'PUT', 'files' => true]) !!}

                                @include('admin.service.partials.form')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
