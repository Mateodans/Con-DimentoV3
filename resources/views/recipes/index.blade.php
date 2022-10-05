<x-app-layout>

    <div class="container" py-8>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($recipes as $recipe)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url({{Storage::url($recipe->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4x1 text-white leading-8 font-bold">
                            <a href="{{route('recipes.show', $recipe)}}" class="inline-block px-3 h-6 bg-gray-600 text-white rounded-full">
                                {{$recipe->title}}
                            </a>
                        </h1>
                        <div>
                            @foreach ($recipe->ingredients as $ingredient)
                                <a href="">{{$ingredient->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </article>
            @endforeach

        </div>

        <div class="mt-4">
            {{$recipes->links()}}
        </div>

    </div>

</x-app-layout>