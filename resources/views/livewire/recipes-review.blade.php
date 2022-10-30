<section class="mt-4 ">
    <h1 class="font-bold text-3xl mb-2">Valoracion</h1>
    @can('update', $recipe)
        <article class="my-4">
            <h2 class="font-bold text-2xl mt-4">Deja tu valoracion</h2>
            @can('valued', $post)
                <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Deje su comentario"></textarea>

                <div class="flex">
                    <button class="btn btn-primary mr-4" wire:click="store">Enviar</button>

                    <ul class="flex text-2xl ml-4">
                        <li wire:click="$set('rating', 1)" class="mr-1 cursor-pointer">
                            <i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li wire:click="$set('rating', 2)" class="mr-1 cursor-pointer">
                            <i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li wire:click="$set('rating', 3)" class="mr-1 cursor-pointer">
                            <i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li wire:click="$set('rating', 4)" class="mr-1 cursor-pointer">
                            <i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li wire:click="$set('rating', 5)" class="mr-1 cursor-pointer">
                            <i class="fas fa-star text-{{ $rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                    </ul>
                </div>
            @else
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <p class="text-center">Ya has valorado esta receta</p>
                </div>
            @endcan
        </article>
    @endcan

    <div class="card">
        <div class="card-body">
            {{dd($recipe)}}
                @foreach ($recipe->reviews as $review)
                <p class="text-gray-800 text-xl">{{$review->count()}} valoraciones</p>
                    <article class="flex mb-4 text-gray-800">
                        <figure class="mr-4">
                                <img class="w-12 h-12 object-cover object-center rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                        </figure>

                        <div class="card flex-1">
                            <div class="card-body bg-gray-100">
                                <p><b>{{$review->user->name}}</b><i class="fas fa-star text-yellow-300"></i>({{$review->rating}})</p>
                                {{$review->comment}}
                            </div>
                        </div>
                    </article>
                @endforeach
        </div>
    </div>
</section>
