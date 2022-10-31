
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Escriba el titulo de la receta']) !!}

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
                    <p>En caso de no subir la receta sin ninguna imagen se subira con la que tiene a la izquierda que es la que esta por defecto</p>
                </div>
            </div>
            
            <div id="steps" class="form-group ">
                {!! Form::label('steps', 'Pasos:', ['class' => 'mt-3']) !!}
                {!! Form::textarea('steps', null, ['class' => 'form-control', 'placeholder' => 'Escriba los pasos a seguir de la receta']) !!}

                @error('step')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
