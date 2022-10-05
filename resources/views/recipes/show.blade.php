<x-app-layout>

    
    <div class="conteiner py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$recipe->title}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$recipe->body}}
        </div>

        <div class="grid grid-cols-3 gap-6">

            <div class="col-span-2 ">

                <figure>
                    <img  class="w-full h-80 object-cover object-center" src="{{Storage::url($recipe->image->url)}}" alt="">
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {{$recipe->steps}}
                </div>

            </div>

            <aside>
                <h1>Mas en 
                @foreach ($recipe->categories as $category)
                {{$category->name}}
                @endforeach
                </h1>
            </aside>

        </div>

    </div>

</x-app-layout>