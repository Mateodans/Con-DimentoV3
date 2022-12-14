@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Editar Recetas</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

<div class="card">
    <div class="card-body">
        {!! Form::model($recipe,['route' => ['admin.recipes.update', $recipe], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

        {!! Form::hidden('user_id', auth()->user()->id) !!}

        @include('admin.recipes.partials.forms')

                {!! Form::submit('Update Recipe', ['class' => 'btn btn-primary']) !!}

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

        $(document).ready(function(){

    $('#file').change(function(e){

  let file= e.target.files[0];

  let reader= new FileReader();

  reader.onload= (event) => {

   $('#picture').attr('src', event.target.result)

  };

  reader.readAsDataURL(file);

})

});

    </script>
@stop