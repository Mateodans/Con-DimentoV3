@props(['recipe'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="{{Storage::url($recipe->image)}}" alt="">

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('recipes.show', $recipe)}}">{{$recipe->name}}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {{$recipe->body}}
        </div>

        <div class="px-6 pt-4 pb-2">
            @foreach ($recipe->ingredients as $ingredient)
                <a href="{{route('recipes.ingredient', $ingredient)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$ingredient->name}}</a>
            @endforeach
        </div>

</article>