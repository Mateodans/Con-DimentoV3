@extends('adminlte::page')

@section('title', 'Con-Dimento')

@section('content_header')
    <h1>Create Recipes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.recipes.store', 'autocomplete' => 'off']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the recipe name']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('body', 'body') !!}
                {!! Form::textarea('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the recipe descripcion']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <p class="font-weight-bold ">Ingredients</p>

                <div class="list-ingredients">
                    @foreach ($ingredients as $ingredient)
                        <div>
                            <label class="mr-2">
                                {!! Form::checkbox('ingredients[]', $ingredient->id, null) !!}
                                {{$ingredient->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label class="mr-2">
                        {!! Form::radio('status', 1, true) !!}
                        Draft copy
                    </label>

                    <label class="mr-2">
                        {!! Form::radio('status', 2) !!}
                        Published
                    </label>
                </div>

                <div class="form-group">
                    {!! Form::label('step', 'Steps:') !!}
                    {!! Form::textarea('step', null, ['class' => 'form-control', 'placeholder' => 'Enter the steps of the recipe']) !!}

                    @error('preparation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Create Recipe', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#step' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop