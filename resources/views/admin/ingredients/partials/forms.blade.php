<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the ingredient name']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>