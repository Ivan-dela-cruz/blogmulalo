{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('category_id', 'Categorías') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('meeting_id', 'Reunión') }}
    {{ Form::select('meeting_id', $meetings, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('place', 'Lugar') }}
    {{ Form::text('place', null, ['class' => 'form-control', 'id' => 'topic']) }}
</div>

<div class="form-group col-lg-4">
    {{ Form::label('date', 'Fecha') }}
    {{ Form::date('date', null,['class' => 'form-control', 'id' => 'date']) }}
</div>
<div class="form-group col-lg-4">
    {{ Form::label('hour', 'Hora') }}
    {{ Form::time('hour', null, ['class' => 'form-control', 'id' => 'hour']) }}
</div>


<div class="form-group">
    {{ Form::label('body', 'Contenido') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/stringToSlug/jquery.stringToSlug.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).ready(function () {
                $("#topic, #slug").stringToSlug({
                    callback: function (text) {
                        $("#slug").val(text);
                    }
                });
            });

            CKEDITOR.config.height = 400;
            CKEDITOR.config.width = 'auto';

            CKEDITOR.replace('body');
        });
    </script>
@endsection