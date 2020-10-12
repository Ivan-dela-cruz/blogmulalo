{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('period_id', 'Periodo Administrativo') }}
	{{ Form::select('period_id', $periodids, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('representative_id', 'Autoridad encargada') }}
    {{ Form::select('representative_id', $representatives, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('topic', 'Título') }}
    {{ Form::text('topic', null, ['class' => 'form-control', 'id' => 'topic']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/stringToSlug/jquery.stringToSlug.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).ready(function(){
                $("#topic, #slug").stringToSlug({
                    callback: function(text){
                        $("#slug").val(text);
                    }
                });
            });

            CKEDITOR.config.height = 400;
            CKEDITOR.config.width  = 'auto';

            CKEDITOR.replace('body');
        });
    </script>
@endsection