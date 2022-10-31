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


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->id}}</td>
                            <td>{{$ingredient->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.ingredients.edit', $ingredient)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.ingredients.destroy', $ingredient)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Borrador</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop