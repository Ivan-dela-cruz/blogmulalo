@extends('admin.base.base')
@section('titulo')
    Planificaciones
@endsection
@section('plani')
    active
@endsection

@section('planiNueva')
    active
@endsection
@section('mainEncabezado')
    Nueva planificación
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Planificaciones</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Nueva</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Nueva planificación</h3>
                        </div>

                        <div class="card card-lift--hover shadow border-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-11 mx-3">
                                    {!! Form::open(['route' => 'planification.store', 'files' => true]) !!}

                                    @include('admin.planifications.partials.form')

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
