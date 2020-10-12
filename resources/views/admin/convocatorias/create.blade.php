@extends('admin.base.base')
@section('titulo')
    Noticias
@endsection
@section('noti')
    active
@endsection

@section('notiNueva')
    active
@endsection
@section('username')
    Auth
@endsection
@section('mainEncabezado')
    Noticias
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Noticias</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Publicadas</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Nueva convocatoria</h3>
                        </div>

                        <div class="card card-lift--hover shadow border-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-11 mx-3">
                                    {!! Form::open(['route' => 'convocatoria.store', 'files' => true]) !!}

                                    @include('admin.convocatorias.partials.form')

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
