@extends('admin.base.base')
@section('titulo')
    Autoridades
@endsection
@section('admiPrincipal')
    active
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/representative.js')}}" type="text/javascript"></script>
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
@guest
@else
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Administración</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                        <a href="{{ route('representative.create') }}"
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
                                    <div class="col-lg-12 input-group input-group-lg">
                                        @foreach($representatives as $representative)
                                            <div class="cat{{$representative->id}} card card-lift--hover col-lg-4 border">
                                                <div class="row row-grid">
                                                    <div class="col-lg-12 text-center">
                                                        @if($representative->file)
                                                            <div class="col-lg-12 py-2">
                                                                <img width="270px" height="200px"
                                                                     src="{{$representative->file}}" alt="Raised image"
                                                                     class="">
                                                            </div>
                                                            <div class="col-lg-11 mx-3">
                                                                <mark class="small">Período administrativo</mark><br>
                                                                <small class="small">Mayo 15,2014 - Mayo 15, 2019</small>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-11 mx-3  bg-light">
                                                        <h4 class="text-dark mx-3">{{$representative->name}} {{$representative->last_name}}</h4>
                                                        <h6 class="text-dark mx-3">{{$representative->position}}<br></h6>
                                                        <h6 class="text-dark mx-3">ci: {{$representative->ci}} <br></h6>
                                                        <h6 class="text-dark mx-3">email: {{$representative->email}}<br></h6>
                                                        <h6 class="text-dark mx-3">contacto: {{$representative->phone}}<br></h6>
                                                        <h6 class="text-dark mx-3">dirección: {{$representative->address}}<br></h6>

                                                        <div class="pull-right">
                                                            <div class="input-group input-group-sm mx-3">
                                                                <a href="{{ route('representative.edit', $representative->id) }}"
                                                                   class=" btn btn-white btn-lg mx-1">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="#"
                                                                   class="delete-modal-cat btn btn-white btn-lg"
                                                                   data-id-cat="{{$representative->id}}"
                                                                   data-name-cat="{{$representative->name}}"
                                                                   data-body-cat="{{$representative->last_name}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <p></p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <br>
                                        {{$representatives->render()}}
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

    {{-- Modal Form Edit and Delete Post --}}
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
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        <label class="text-danger" for="">Esta seguro en eliminar</label> <span
                                class="name-cat-delete"></span>?
                        <span class="hidden id-cat-delete"></span>
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