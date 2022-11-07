
@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Crear Recetas</h1>
@stop

@section('content')


<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.recipes.store', 'autocomplete' => 'off', 'files' => true]) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
            @include('admin.recipes.partials.forms')

            {!! Form::submit('Crear receta', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')

    <script>
        ClassicEditor
            .create( document.querySelector( '#steps' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop