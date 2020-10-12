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
    Servicios publicadas
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
                            <h3 class="card-title">Detalle de servicio</h3>
                            <div class="card-tools pull-right">
                                <div class="input-group input-group-sm pull-right" style="width: 150px;">
                                    <div class="input-group-append">
                                        <a href="{{ route('services.edit', $service->id) }}"
                                           class="btn btn-info btn-sm mx-2">
                                            <i class="fa fa-pencil nav-icon"></i>
                                            editar
                                        </a>
                                        <a href="{{ route('service-published') }}"
                                               class="btn btn-warning btn-sm mx-2">
                                            <i class="fa fa-backward nav-icon"></i>
                                            Salir
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                        <h5 class="display-4">Título: {{$service->name}}</h5>
                        <div class="col-lg-12">
                            <div class="card card-lift--hover shadow border-0 mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-lg-11 mx-3">
                                        @if($service->file)
                                            <img src="{{$service->file}}" alt="Raised image"
                                                 class="img-fluid rounded shadow-lg">
                                        @endif
                                    </div>
                                    <div class="col-lg-11 mt-3 mx-3">
                                        <h5>Descripción</h5>
                                        <p class="small">{{$service->excerpt}}</p>
                                        <hr>
                                        <h5>Contenido</h5>
                                        {!! $service->body !!}
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
                                                    <a href="#"> {{$service->category->name}}</a>
                                                </td>
                                                <td>{{$service->status}}</td>
                                                <td>{{$service->slug}}</td>
                                                <td>{{$service->created_at}}</td>
                                                <td>{{$service->updated_at}}</td>
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
