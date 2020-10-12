@extends('admin.base.base')
@section('titulo')
    Servicios
@endsection
@section('servi')
    active
@endsection

@section('serviNuevo')
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
                            <h3 class="card-title">Nuevo Servicio</h3>
                        </div>

                        <div class="card card-lift--hover shadow border-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-11 mx-3">
                                    {!! Form::open(['route' => 'services.store', 'files' => true]) !!}

                                    @include('admin.service.partials.form')

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection