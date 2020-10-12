@extends('admin.base.base')
@section('titulo')
    Noticias
@endsection
@section('noti')
    active
@endsection

@section('notiPublicadas')
    active
@endsection
@section('username')
    Auth
@endsection
@section('mainEncabezado')
    Noticias publicadas
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
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Detalle noticia</h3>
                            <div class="card-tools pull-right">
                                <div class="input-group input-group-sm pull-right" style="width: 150px;">
                                    <div class="input-group-append">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="btn btn-info btn-sm mx-2">
                                            <i class="fa fa-pencil nav-icon"></i>
                                            editar
                                        </a>
                                        <a href="{{ route('post-published') }}"
                                               class="btn btn-warning btn-sm mx-2">
                                            <i class="fa fa-backward nav-icon"></i>
                                            Salir
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        <h5 class="display-4">Título: {{$post->name}}</h5>
                        <div class="col-lg-12">
                            <div class="card card-lift--hover shadow border-0 mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-lg-11 mx-3 text-center">
                                        @if($post->file)
                                            <img src="{{$post->file}}" alt="Raised image"
                                                 class="img-fluid rounded shadow-lg">
                                        @endif
                                    </div>
                                    <div class="col-lg-11 mt-3 mx-3">
                                        <h5>Descripción</h5>
                                        <p class="small">{{$post->excerpt}}</p>
                                        <hr>
                                        <h5>Contenido</h5>
                                        {!! $post->body !!}
                                        <hr>
                                    </div>
                                    <div class="col-lg-11 mt-3 mx-3">
                                        <div class="table-responsive">
                                            <table class="table-responsive table-bordered table-hover">
                                                <thead>
                                                <th>Categoría</th>
                                                <th>Estado</th>
                                                <th>url</th>
                                                <th>Etiquetas</th>
                                                <th>fecha de Creación</th>
                                                <th>ultíma actulización</th>
                                                </thead>
                                                <tbody>
                                                <td>
                                                    <a href="#"> {{$post->category->name}}</a>
                                                </td>
                                                <td>{{$post->status}}</td>
                                                <td>{{$post->slug}}</td>
                                                <td>
                                                    @foreach($post->tags as $tag)
                                                        <a href="#">{{$tag->name}}</a>,
                                                    @endforeach
                                                </td>
                                                <td>{{$post->created_at}}</td>
                                                <td>{{$post->updated_at}}</td>
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
