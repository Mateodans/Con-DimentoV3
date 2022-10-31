@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Crear Ingredientes</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.ingredients.store']) !!}

                @include('admin.ingredients.partials.forms')

                {!! Form::submit('Create ingredient', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
