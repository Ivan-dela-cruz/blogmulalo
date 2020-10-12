@extends('admin.base.base')
@section('titulo')
    Noticias
@endsection
@section('noti')
    active
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/post.js')}}" type="text/javascript"></script>
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
@guest
@else
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
                                        <a href="{{ route('convocatoria.create') }}"
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
                                <table id="table" class="table table-hover table-bordered">
                                    <thead class="text-black-50 text-xl-center">
                                    <th width="10px">N°</th>
                                    <th>Categoría</th>
                                    <th>Tema</th>
                                    <th>Fecha y Hora</th>
                                    <th>Lugar</th>
                                    <th>Contenido</th>
                                    <th>Autoridad en cargada</th>
                                    <th >Acciones</th>


                                    </thead>
                                    <tbody>
                                    {{ csrf_field() }}
                                    <?php  $no = 1; ?>
                                    @foreach( $releases as $release )
                                        <tr class="cat{{$release->id}}">

                                            <td>{{$release->id}}</td>
                                            <td>{{$release->category->name}}</td>
                                            <td>{{$release->meeting->topic}} </td>
                                            <td>{{$release->date}} {{$release->hour}} </td>
                                            <td>{{$release->place}}</td>
                                            <td>{!! $release->body !!}</td>
                                            <td>{{$release->meeting->representative->name}}</td>
                                            <td align="center" width="10px">
                                                <a href="{{ route('convocatoria.edit', $release->id) }}" class=" btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{ route('convocatoria.edit', $release->id) }}" class="edit-modal-cat btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                {!! Form::open(['route' => ['convocatoria.destroy', $release->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$releases->render()}}
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