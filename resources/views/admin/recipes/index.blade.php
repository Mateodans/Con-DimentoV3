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

<button type="submit" onclick="return confirm('¿Quiere Eliminar el receta?')" class=" text-white btn bg-red-800">Eliminar</button>

    {{-- @livewire('admin.recipes-index')  --}}
    <x-recipes-index :recipes="$recipes" />

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop