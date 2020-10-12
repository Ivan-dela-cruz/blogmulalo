@extends('admin.base.base')
@section('titulo')
    Servicios en borrador
@endsection
@section('servi')
    active
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/service.js')}}" type="text/javascript"></script>
@endsection
@section('serviBorrador')
    active
@endsection
@section('username')
    Auth
@endsection
@section('mainEncabezado')
    Servicios no publicadas
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Servicios</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Publicadas</a></li>
@endsection
@guest
@else
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Lista borrador</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{ route('services.create') }}"
                                           class="btn btn-info btn-sm mx-2">
                                            <i class="fa fa-plus nav-icon"></i>
                                            Añadir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="table" class="table m-0 table-bordered">
                                    <tbody>
                                    {{ csrf_field() }}
                                    <div class="col-lg-12">
                                        @foreach($services as $service)
                                            <div class="cat{{$service->id}} card card-lift--hover shadow border-0 mt-3">
                                                <div class="row row-grid">
                                                    <div class="col-lg-3 mt-3 mx-2 mb-2 py-2">
                                                        @if($service->file)
                                                            <img src="{{$service->file}}" alt="Raised image"
                                                                 class="img-fluid rounded shadow-lg">
                                                            <mark class="small">Fecha creación</mark>
                                                            <small class="small">{{$service->updated_at}}</small>
                                                            <mark class="small">última edición</mark>
                                                            <small class="small">{{$service->created_at}}</small>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-8 mt-3 mx-2 mb-2 py-2">
                                                        <h6 class="text-primary text-uppercase">{{$service->name}}</h6>
                                                        <p class="small">{{$service->excerpt}}</p>
                                                        <div class="row">
                                                            <div class="input-group input-group-sm">
                                                                <a href="{{ route('services.show', $service->id) }}"
                                                                   class=" btn btn-info btn-sm mx-1">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('services.edit', $service->id) }}"
                                                                   class=" btn btn-warning btn-sm mx-1">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="#" class="delete-modal-cat btn btn-danger btn-sm"
                                                                   data-id-cat="{{$service->id}}"
                                                                   data-name-cat="{{$service->name}}" data-body-cat="{{$service->body}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <br>
                                        {{$services->render()}}
                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Form Edit and Delete Service --}}
    <div id="myModal-cat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-cat"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id-cat-edit" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Nombre</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="name-cat-edit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bodycat">Contenido</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="body-cat-edit"
                                       placeholder="etiqueta-url" required>
                            </div>
                        </div>
                    </form>
                    {{-- Form Delete Service --}}
                    <div class="deleteContent">
                        <label class="text-danger" for="">Esta seguro en eliminar</label> <span
                                class="name-cat-delete"></span>?
                        <span class="id-cat-delete"></span>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>cancelar
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection
@endguest