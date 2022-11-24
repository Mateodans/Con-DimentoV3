<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <div class="container py-8 min-h-screen mb-500">
        <h1 class="text-4xl font-bold text-gray-600">{{$recipe->title}}</h1>
        <br>

        <div class="text-lg text-gray-500 mb-7">
            {{$recipe->body}}
        </div>

        <h2 class="text-2xl font-bold text-gray-600">Ingredientes a usar: </h2>
        <div class="px-6 pt-4 pb-2">
            @foreach ($recipe->ingredients as $ingredient)
                <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="recipes/ingredient/{{$ingredient->id}}">{{$ingredient->name}}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 ">
                 <br>
                <figure>
                    @if ($recipe->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($recipe->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/06/06/22/37/italian-cuisine-2378729_1280.jpg" alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{$recipe->steps}}
                </div>

            </div>

            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4s">Mas en
                @foreach ($recipe->categories as $category)
                {{$category->name}}
                @endforeach
                </h1>
                <ul>
                    @foreach ($similar as $similares)
                    @if($similares->id == $recipe->id)
                    @continue
                    @endif
                    <li class="mb-4">
                        <a class="flex" href="{{route('recipes.show', $similares)}}">
                            @if ($similares->image)
                                <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similares->image->url)}}" alt="">
                            @else
                                <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/06/06/22/37/italian-cuisine-2378729_1280.jpg" alt="">
                            @endif
                            <span class="ml-2 text-gray-600">{{$similares->title}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
        @livewire('recipes-review', ['recipe' => $recipe])
    </div>
</x-app-layout>