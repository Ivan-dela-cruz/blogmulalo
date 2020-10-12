@extends('layouts.app')
@section('titulo')
    Etiquetas
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-11 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Etiquetas de las publicaciones</h4>
                        <p class="card-category">Administración GAD MULALÓ 2014-2019</p>

                        <div class="panel-default">
                            <div class="panel-heading">
                                Crear etiquetas
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        {!! Form::open(['route'=> 'tag.store']) !!}
                        @include('admin.tag.partials.form')

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection