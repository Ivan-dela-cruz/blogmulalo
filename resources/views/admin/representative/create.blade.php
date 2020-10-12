@extends('admin.base.base')
@section('titulo')
Autoridades
@endsection
@section('admiPrincipal')
    active
@endsection

@section('admiDirectiva')
    active
@endsection
@section('mainEncabezado')
    Autoridades de la parroquia
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Administración</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Directiva</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Registrar autoridad</h3>
                        </div>

                        <div class="card card-lift--hover shadow border-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    {!! Form::open(['route' => 'representative.store', 'files' => true]) !!}

                                    @include('admin.representative.partials.form')

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
