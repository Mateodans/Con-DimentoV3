@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right"  href="{{route('admin.ingredients.create')}}">Nuevo ingrediente</a>

    <h1>Lista de ingredientes</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-danger">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

    @livewire('admin.ingrediente-search')

@stop