        <x-app-layout>
            {!! Form::model($recipe,['route' => ['usuario.recipes.update', $recipe], 'autocomplete' => 'off', 'files' => true, 'method' => 'patch'])  !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
        <div class="shadow sm:overflow-hidden sm:rounded-md">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div class="form-group">
                {!! Form::label('title', 'Titulo') !!}
                {!! Form::text('title', null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5', 'placeholder' => 'Escriba el titulo de la receta']) !!}

                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

                    <div id="body">
                      <label for="body" class="block text-sm font-medium text-gray-700">Descripcion</label>
                      <div class="mt-1">
                        <textarea id="body" name="body" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Escribí la descripcion de tu receta"></textarea>

                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ']) !!}

                @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold ">Ingredientes</p>
                <div class="list-ingredients">
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex ">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                        @foreach ($ingredients as $ingredient)
                            <div class="flex items-center pl-3">
                                {!! Form::checkbox('ingredients[]', $ingredient->id, null, ['class' => 'w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500']) !!}
                                 <label class="py-3 ml-2 w-full font-medium">
                                {{$ingredient->name}}
                            </label>
                        </div>
                        @endforeach
                    </li>
                </ul>
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
                    {{-- <div class="col">
                        <div class="image-wrapper">
                            @isset ($recipe->image)
                                <img id="picture" src="{{Storage::url($recipe->image->url)}}" alt="">
                            @else
                                <img id="picture" src="https://cdn.pixabay.com/photo/2017/06/06/22/37/italian-cuisine-2378729_1280.jpg" alt="">
                            @endisset
                        </div>
                    </div> --}}

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cover photo</label>
                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                          <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                              <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 ">
                              <label for="file" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Agrega una imagen a tu receta</span>
                                <input id="file" accept="image/*" name="file" type="file" class="sr-only">
                              </label>
                            </div>
                            <p class="text-xs text-gray-500">Caracteristicas que la imagen tiene que tener</p>
                            <p class="text-xs text-gray-500">Debe tener en caso de ser posible mas 550px de ancho y 310px de largo</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="steps">
                        <label for="steps" class="block text-sm font-medium text-gray-700">Pasos de la receta</label>
                        <div class="mt-1">
                          <textarea id="steps" name="steps" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Escribí los pasos de tu receta"></textarea>

                          @error('steps')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    {!! Form::submit('Editar receta', ['class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 m-3 ']) !!}

                {!! Form::close() !!}
                </div>
            </div>
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
