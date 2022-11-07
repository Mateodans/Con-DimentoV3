@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')

    <a href="{{route('admin.recipes.create')}}" class="btn btn-secondary btn-sm float-right">Nueva Receta</a>

    <h1>Lista de las Recetas</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

    @livewire('admin.recipe-search')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop