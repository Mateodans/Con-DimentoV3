@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Edit categories</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

<div class="card">
    <div class="card-body">

        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put' ]) !!}

        {{-- <form action="{{ route(['admin.categories.update']) }}" method="POST"> --}}
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoria" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="internacional">Internacional</label>
                <input type="number" name="internacional" id="internacional" class="form-control" placeholder="Si la categoria es internacional pulse 1 si no lo es 0" value="{{ old('internacional') }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">category update</button>
            </div>
        {{-- </form> --}}
        {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop