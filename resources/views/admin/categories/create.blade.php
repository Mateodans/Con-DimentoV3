@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Create new categories</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoria" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="internacional">Internacional</label>
                    <input type="number" name="internacional" id="internacional" class="form-control" placeholder="Si la categoria es Internacional pulse 1 sino 0" value="{{ old('internacional') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            {{-- {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the category name']) !!}
                    {!! Form::select('nacionalidad', array('internacional' => 'internacional', 'nacional' => 'nacional'), 'internacional`');!!}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!} --}}
        </div>
    </div>
@stop

