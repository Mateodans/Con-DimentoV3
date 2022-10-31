<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del ingrediente']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>