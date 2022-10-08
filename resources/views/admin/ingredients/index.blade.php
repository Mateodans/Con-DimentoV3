@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right"  href="{{route('admin.ingredients.create')}}">New ingredient</a>

    <h1>Index of ingredients</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-danger">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->id}}</td>
                            <td>{{$ingredient->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.ingredients.edit', $ingredient)}}">Edit</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.ingredients.destroy', $ingredient)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop