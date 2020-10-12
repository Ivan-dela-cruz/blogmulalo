@extends('admin.base.base')
@guest
@else
@section('titulo')
    Categoría planificaciones
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/categoryplani.js')}}" type="text/javascript"></script>
@endsection
@section('plani')
    active
@endsection

@section('planiCategoria')
    active
@endsection
@section('username')
    Auth
@endsection


@section('mainEncabezado')
    Categorias para noticias
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Planificaciones</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Categorias</a></li>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Lista categorias</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                        <a href="#"
                                           class="create-modalcat btn btn-info btn-sm mx-2">
                                            <i class="fa fa-plus nav-icon"></i>
                                            Añadir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="table" class="table m-0 table-bordered table-responsive">
                                    <thead class="text-black-50 text-xl-center">
                                    <th width="10px">N°</th>
                                    <th>Nombre</th>
                                    <th>Contenido</th>
                                    <th>Fecha creación</th>
                                    <th>Fecha actualización</th>
                                    <th colspan="3">Acciones</th>


                                    </thead>
                                    <tbody>
                                    {{ csrf_field() }}
                                    <?php  $no = 1; ?>
                                    @foreach( $categorys as $category )
                                        <tr class="cat{{$category->id}}">

                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->body}}</td>
                                            <td>{{$category->created_at}}</td>
                                            <td>{{$category->updated_at}}</td>
                                            <td width="10px">
                                                <a href="#" class="show-modal-cat btn btn-info btn-sm"
                                                   data-id-cat="{{$category->id}}" data-name-cat="{{$category->name}}"
                                                   data-body-cat="{{$category->body}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a href="#" class="edit-modal-cat btn btn-warning btn-sm"
                                                   data-id-cat="{{$category->id}}"
                                                   data-name-cat="{{$category->name}}" data-body-cat="{{$category->body}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a href="#" class="delete-modal-cat btn btn-danger btn-sm"
                                                   data-id-cat="{{$category->id}}"
                                                   data-name-cat="{{$category->name}}" data-body-cat="{{$category->body}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$categorys->render()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal Form Create Post --}}
    <div id="create-cat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-cat"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal-cat" role="form">
                        <div class="form-group row add">
                            <label class="control-label col-sm-2" for="namecat">Nombre:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="namecat" name="namecat"
                                       placeholder="nombre categoría" required>

                                <p class="name-error text-center alert-danger hide">Este campo es obligatorio</p>
                            </div>
                        </div>
                        <div class="form-group row add">
                            <label class="control-label col-sm-2" for="bodycat">Contenido:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="bodycat" name="bodycat"
                                       placeholder="haz una breve descripción" required>
                                <p class="body-error text-center alert-danger hide">Este campo es obligatorio</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit" id="add-cat">
                        <span class="fa fa-plus"></span>añadir
                    </button>
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <span class="fa fa-backward"></span>cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Show POST --}}
    <div id="show-cat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-cat"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group border">
                        <label for="">id:</label>

                        <span class="text-info"><b id="idcat"/></span>
                    </div>
                    <div class="form-group border">
                        <label for="">Nombre:</label>
                        <span class="text-info"><b id="namecatshow"/></span>
                    </div>
                    <div class="form-group border">
                        <label for="">Contenido:</label>
                        <span class="text-info"><b id="bodycatshow"/></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <label class="control-label col-sm-2" for="name">Nombre:</label>
                            <div class="col-sm-12">
                                <input type="name" class="form-control" id="name-cat-edit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="bodycat">Contenido:</label>
                            <div class="col-sm-12">
                                <textarea type="name" class="form-control" id="body-cat-edit"
                                          placeholder="haz una breve descripción" required></textarea>
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