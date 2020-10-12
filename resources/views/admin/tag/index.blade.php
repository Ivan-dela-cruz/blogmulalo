@extends('admin.base.base')

@guest
@else
@section('titulo')
    Etiquetas
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/tag.js')}}" type="text/javascript"></script>
@endsection
@section('noti')
    active
@endsection

@section('notiEtiqueta')
    active
@endsection
@section('username')
    Auth
@endsection


@section('mainEncabezado')
    Etiquetas para noticias
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Noticias</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Etiquetas</a></li>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Lista</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                        <a href="#"
                                           class="create-modaltag btn btn-info btn-sm mx-2">
                                            <i class="fa fa-plus nav-icon"></i>
                                            Añadir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="table" class="table table-hover table-bordered">
                                    <thead class="text-dark text-xl-center">
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>url</th>
                                    <th class="">Fecha creación</th>
                                    <th>Fecha actualización</th>
                                    <th colspan="3">acciones</th>

                                    </thead>
                                    <tbody>
                                    {{ csrf_field() }}
                                    <?php  $no = 1; ?>
                                    @foreach( $tags as $tag )
                                        <tr class="tag{{$tag->id}}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{$tag->name}}</td>
                                            <td>{{$tag->slug}}</td>
                                            <td>{{$tag->created_at}}</td>
                                            <td>{{$tag->updated_at}}</td>

                                            <td>
                                                <a href="#" class="show-modal-tag btn btn-outline-info btn-sm"
                                                   data-id-tag="{{$tag->id}}" data-name-tag="{{$tag->name}}"
                                                   data-slug-tag="{{$tag->slug}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="#" class="edit-modal-tag btn btn-outline-info btn-sm"
                                                   data-id-tag="{{$tag->id}}"
                                                   data-name-tag="{{$tag->name}}" data-slug-tag="{{$tag->slug}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="delete-modal-tag btn btn-outline-info btn-sm"
                                                   data-id-tag="{{$tag->id}}"
                                                   data-name-tag="{{$tag->name}}" data-slug-tag="{{$tag->slug}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </td>

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$tags->render()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal Form Create Post --}}
    <div id="create-tag" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header badge-dark">
                    <h4 class="modal-title-tag"></h4>
                    <button type="button" class="close text-info" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal-tag" role="form">
                        <div class="form-group row add mx-3">
                            <label class="control-label col-sm-10" for="nametag">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nametag" name="nametag"
                                       placeholder="nombre etiqueta" required>
                                <p class="alert-error text-center alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group row add mx-3">
                            <label class="control-label col-sm-10" for="slug">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="slug" name="slug" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" id="add-tag">
                        <span class=""></span>añadir
                    </button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">
                        <span class=""></span>cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Form Show POST --}}
    <div id="show-tag" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header badge-dark">
                    <h4 class="modal-title-tag"></h4>
                    <button type="button" class="close text-info" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-3 text-secondary" for="">id</label>

                        <span class="text-dark"><b id="idtag"/></span>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 text-secondary" for="">Nombre</label>
                        <span class="text-dark"><b id="nametagshow"/></span>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 text-secondary" for="">slug</label>
                        <span class="text-dark"><b id="slugtag"/></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal-tag" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header badge-dark">
                    <h4 class="modal-title-tag"></h4>
                    <button type="button" class="close text-info" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id-tag-edit" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Nombre</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="name-tag-edit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="slug">Slug</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="slug-tag-edit"
                                       placeholder="etiqueta-url" required>
                            </div>
                        </div>
                    </form>
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        <label class="text-danger" for="">Esta seguro en eliminar</label> <span
                                class="name-tag-delete"></span>?
                        <span class="hidden id-tag-delete"></span>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class=""></span>cancelar
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection

@endguest