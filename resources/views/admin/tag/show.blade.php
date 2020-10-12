@extends('layouts.app')
@section('titulo')
    Etiquetas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">


        </div>
        <div class="row">


        </div>
        <div class="row">
            <div class="col-lg-11 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Etiquetas de las publicaciones</h4>
                        <p class="card-category">Administración GAD MULALÓ 2014-2019</p>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="panel-heading">
                            Ver de Etiqueta
                            <div class="panel-body">
                                <p><strong>Nombre</strong>{{$tag->name}}</p>
                                <p><strong>Slug</strong>{{$tag->slug}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection