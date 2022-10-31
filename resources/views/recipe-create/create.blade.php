<x-app-layout>
<div class="card">
    <div class="form-group">
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title', null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Escriba el titulo de la receta']) !!}

        @error('title')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    <div id="body" class="form-group">
        {!! Form::label('body', 'Descripcion') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Escriba la descripcion de la receta']) !!}

        @error('body')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

        @error('category_id')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        <p class="font-weight-bold ">Ingredientes</p>
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
        @error('ingredients')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group mt-3">
            <p class="font-weight-bold">Estado</p>

            <label class="mr-2">
                {!! Form::radio('status', 1, true) !!}
                Borrador
            </label>
            <label class="mr-2">
                {!! Form::radio('status', 2) !!}
                Publicado
            </label>
            @error('status')
                <span class="text-danger">{{$message}}</span>
            @enderror
    </div>

        <div class="row">
            <div class="col">
                <div class="image-wrapper">
                    @isset ($recipe->image)
                        <img id="picture" src="{{Storage::url($recipe->image->url)}}" alt="">
                    @else
                        <img id="picture" src="https://cdn.pixabay.com/photo/2017/06/06/22/37/italian-cuisine-2378729_1280.jpg" alt="">
                    @endisset
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    {!! Form::label('file', 'Imagen de la receta') !!}
                    {!! Form::file('file', ['accept' => 'image/*', 'class' => 'form-control-file']) !!}
                    @error('file')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <p>Caracteristicas que la imagen tiene que tener</p>
                <p>Debe tener en caso de ser posible mas 550px de ancho y 310px de largo</p>
            </div>
        </div>

        <div id="steps" class="form-group ">
            {!! Form::label('steps', 'Pasos:', ['class' => 'mt-3']) !!}
            {!! Form::textarea('steps', null, ['class' => 'form-control', 'placeholder' => 'Escriba los pasos a seguir de la receta']) !!}

            @error('step')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

            {!! Form::submit('Crear receta', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>


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
