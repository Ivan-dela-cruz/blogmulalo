{{ Form::hidden('user_id', auth()->user()->id) }}
<p></p>
<div class="form-group">
    {{ Form::label('period_id', 'Administración') }}
    {{ Form::select('period_id', $periods, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Nombres') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('last_name', 'Apellidos') }}
    {{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}
</div>
<div class="form-group">
    {{ Form::label('ci', 'CI') }}
    {{ Form::text('ci', null, ['class' => 'form-control', 'id' => 'ci']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>
<div class="form-group">
    {{ Form::label('position', 'Cargo') }}
    {{ Form::text('position', null, ['class' => 'form-control', 'id' => 'position']) }}
</div>
<div class="form-group">
    {{ Form::label('address', 'Dirección') }}
    {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) }}
</div>
<div class="form-group">
    {{ Form::label('phone', 'Télefono') }}
    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success']) }}

</div>

@section('scripts')
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}" type="text/javascript"></script>
@endsection