
        <div class="form-group">
            {!! Form::label('title', 'title') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter the recipe name']) !!}

            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('body', 'body') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter the recipe descripcion']) !!}

            @error('body')
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
            @error('ingredients')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <div class="form-group mt-3">
                <p class="font-weight-bold">Estado</p>

                <label class="mr-2">
                    {!! Form::radio('status', 1, true) !!}
                    Draft copy
                </label>
                <label class="mr-2">
                    {!! Form::radio('status', 2) !!}
                    Published
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
                        {!! Form::label('file', 'Image of the recipe') !!}
                        {!! Form::file('file', ['accept' => 'image/*', 'class' => 'form-control-file']) !!}
                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <p>Characteristics that the image should have</p>
                </div>
            </div>

            <div class="form-group ">
                {!! Form::label('steps', 'Steps:', ['class' => 'mt-3']) !!}
                {!! Form::textarea('steps', null, ['class' => 'form-control', 'placeholder' => 'Enter the steps of the recipe']) !!}

                @error('step')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>