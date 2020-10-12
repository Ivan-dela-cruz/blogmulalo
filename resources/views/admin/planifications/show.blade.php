@extends('admin.base.base')
@section('titulo')
    Detalle planificación
@endsection
@section('plani')
    active
@endsection

@section('planiPublicadas')
    active
@endsection

@section('mainEncabezado')
    Planificaciones publicadas
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Planificaciones</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Detalle planificacón</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Detalle planificación</h3>
                            <div class="card-tools pull-right">
                                <div class="input-group input-group-sm pull-right" style="width: 150px;">
                                    <div class="input-group-append">
                                        <a href="{{ route('planification.edit', $planification->id) }}"
                                           class="btn btn-info btn-sm mx-2">
                                            <i class="fa fa-pencil nav-icon"></i>
                                            editar
                                        </a>
                                        <a href="{{ route('plan-published') }}"
                                               class="btn btn-warning btn-sm mx-2">
                                            <i class="fa fa-backward nav-icon"></i>
                                            Salir
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="card card-lift--hover shadow border-0 mt-3">
                                <h5 class="display-4 mx-5">Título: {{$planification->name}}</h5>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 mx-3">
                                        @if($planification->file)
                                            <img width="100%" height="400px" src="{{$planification->file}}" alt="Raised image"
                                                 class="img-fluid rounded shadow-lg">
                                        @endif
                                    </div>
                                    <div class="col-lg-5 mx-3 py-3">
                                        @if($planification->pdf)
                                            <iframe width="100%" height="400px" src="{{$planification->pdf}}" frameborder="0"></iframe>
                                        @endif
                                        <h6>Documento pdf planificación</h6>
                                    </div>
                                    <div class="col-lg-11 mt-3 mx-3">
                                        <h5>Descripción</h5>
                                        <p class="small">{{$planification->description}}</p>
                                        <hr>
                                        <h5>Contenido</h5>
                                        {!! $planification->body !!}
                                        <hr>
                                    </div>
                                    <div class="col-lg-11 mt-3 mx-3">
                                        <div class="table-responsive">
                                            <table class="table-responsive table-bordered table-hover">
                                                <thead>
                                                <th>Categoría</th>
                                                <th>Estado</th>
                                                <th>url</th>
                                                <th>fecha de Creación</th>
                                                <th>ultíma actulización</th>
                                                </thead>
                                                <tbody>
                                                <td>
                                                    <a href="#"> {{$planification->category->name}}</a>
                                                </td>
                                                <td>{{$planification->status}}</td>
                                                <td>{{$planification->slug}}</td>
                                                <td>{{$planification->created_at}}</td>
                                                <td>{{$planification->updated_at}}</td>
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
