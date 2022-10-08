@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Edit Ingredient</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($ingredient, ['route' => ['admin.ingredients.update', $ingredient], 'method' => 'put']) !!}

            @include('admin.ingredients.partials.forms')

                {!! Form::submit('Update ingredient', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop