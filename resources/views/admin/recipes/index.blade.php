@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')

    <a href="{{route('admin.recipes.create')}}" class="btn btn-secondary btn-sm float-right">New Recipe</a>

    <h1>List of Recipes</h1>
@stop

@section('content')
    @livewire('admin.recipes-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop