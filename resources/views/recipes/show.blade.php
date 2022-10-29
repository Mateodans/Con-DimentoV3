<x-app-layout>

    <div class="container py-8 min-h-screen mb-500">
        <h1 class="text-4xl font-bold text-gray-600">{{$recipe->title}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$recipe->body}}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 ">

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
        @livewire('recipes-review', ['recipe' => $recipe]);
    </div>
</x-app-layout>