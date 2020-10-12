@extends('admin.base.base')

@section('titulo')
    Periodo Administrativo
@endsection
@section('scripts')
    <script src="{{asset('admin/plugins/ajax/period.js')}}" type="text/javascript"></script>
@endsection
@section('admiPrincipal')
    active
@endsection

@section('adminPeriodo')
    active
@endsection

@section('mainEncabezado')
    Periodo de Administración del GAD parroquial Mulaló
@endsection
@section('niveles')
    <li class="breadcrumb-item"><a class="text-dark" href="#">Principal</a></li>
    <li class="breadcrumb-item"><a class="text-dark" href="#">Adminitración</a></li>
    <li class="breadcrumb-item"><a class="" href="#">Período administrativo</a></li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Periodos</h3>
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
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover table-bordered">
                                <thead class="text-dark text-xl-center">
                                <th>N°</th>
                                <th>Movimieno político</th>
                                <th>fecha de inicio</th>
                                <th>fecha de finalzaión</th>
                                <th>fecha de ingreso</th>
                                <th>última actualización</th>
                                <th colspan="3">acciones</th>

                                </thead>
                                <tbody>
                                {{ csrf_field() }}
                                <?php  $no = 1; ?>
                                @foreach( $periods as $period )
                                    <tr class="period{{$period->id}}">
                                        <td>{{ $no++ }}</td>
                                        <td>{{$period->name}}</td>
                                        <td>{{$period->start_date}}</td>
                                        <td>{{$period->end_date}}</td>
                                        <td>{{$period->created_at}}</td>
                                        <td>{{$period->updated_at}}</td>

                                        <td>
                                            <a href="#" class="show-modal-tag btn btn-info btn-sm"
                                               data-id-tag="{{$period->id}}" data-name-tag="{{$period->name}}"
                                               data-slug-tag="{{$period->start_date}}"
                                               data-end-date="{{$period->end_date}}">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                        </td>
                                        <td>
                                            <a href="#" class="edit-modal-tag btn btn-warning btn-sm"
                                               data-id-tag="{{$period->id}}" data-name-tag="{{$period->name}}"
                                               data-slug-tag="{{$period->start_date}}"
                                               data-end-date="{{$period->end_date}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="delete-modal-tag btn btn-danger btn-sm"
                                               data-id-tag="{{$period->id}}" data-name-tag="{{$period->name}}"
                                               data-slug-tag="{{$period->start_date}}"
                                               data-end-date="{{$period->end_date}}">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                        </td>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$periods->render()}}
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
                <div class="modal-header">
                    <h4 class="modal-title-tag"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal-tag" role="form">
                        <div class="form-group row add">
                            <label class="control-label col-sm-12" for="nametag">Nombre:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nametag" name="nametag"
                                       placeholder="nombre movimiento politico" required>
                                <p class="alert-error text-center alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group row add">
                            <label class="control-label col-sm-12" for="slug">Fecha inicio:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="slug" name="slug" required>
                            </div>
                        </div>
                        <div class="form-group row add">
                            <label class="control-label col-sm-12" for="datend">Fecha finalización:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="datend" name="datend" required>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" id="add-tag">
                        <span class="fa fa-plus"></span>añadir
                    </button>
                    <button class="btn btn-info" type="button" data-dismiss="modal">
                        <span class="fa fa-times"></span>cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Form Show POST --}}
    <div id="show-tag" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-tag"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group border">
                        <label for="">id:</label>

                        <span class="text-info"><b id="idtag"/></span>
                    </div>
                    <div class="form-group border">
                        <label for="">Nombre :</label>
                        <span class="text-info"><b id="nametagshow"/></span>
                    </div>
                    <div class="form-group border">
                        <label for="">Inicio de la Administración :</label>
                        <span class="text-info"><b id="slugtag"/></span>
                    </div>
                    <div class="form-group border">
                        <label for="">Fin de la Administración :</label>
                        <span class="text-info"><b id="dateend"/></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal-tag" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-tag"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                            <label class="control-label col-sm-12" for="name">Nombre</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="name-tag-edit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="slug">Fecha de inicio</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="slug-tag-edit" required>
                            </div>
                        </div>
                        <div class="form-group row add">
                            <label class="control-label col-sm-12" for="dat-end">Fecha finalización</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="dat-end" name="dat-end" required>
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
                        <span class="glyphicon glyphicon"></span>cancelar
                    </button>

                </div>
            </div>
        </div>
    </div>


@endsection