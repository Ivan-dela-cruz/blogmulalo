@extends('admin.base.base')
@section('titulo')
    Editar planificaciones
@endsection
@section('plani')
    active
@endsection

@section('planiPublicadas')
    active
@endsection

@section('mainEncabezado')
    Editar
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Planificaciones</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Editar</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Editar planificación</h3>
                            <div class="card-tools pull-right">
                                <div class="input-group input-group-sm pull-right" style="width: 80px;">
                                    <div class="input-group-alternative">
                                        <a href="{{ route('plan-published') }}"
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
                                {!! Form::model($planification, ['route' => ['planification.update', $planification->id], 'method' => 'PUT', 'files' => true]) !!}

                                @include('admin.planifications.partials.form')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
