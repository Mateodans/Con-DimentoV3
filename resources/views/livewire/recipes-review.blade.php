@php
$reviews = $recipe->reviews;
$user = auth()->user();
@endphp
<section class="mt-4 ">
    <h1 class="font-bold text-3xl mb-2">Valoracion</h1>
    @if (auth()->user())
        @if (($recipe->user_id == $user->id))
        <p class="text-gray-700 text-sm mb-4">No puedes valorar tu propia receta</p>
        @else
            @if ($recipe->user_id !== $user->id)
                @isset($user->recipe->reviews)
                    @foreach ($user->reviews as $user_review)
                        @if ($user_review == $review)
                        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <p class="text-center">Ya has valorado esta receta</p>
                        </div>
                        @endif
                    @endforeach

                @else
                <article class="my-4">
                    <h2 class="font-bold text-2xl mt-4">Deja tu valoracion</h2>
                    <form method="GET" >
                        <textarea wire:model="comment" class="block p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2" rows="3" placeholder="Deje su comentario"></textarea>

                        <div class="flex items-center">
                            <button wire:click="store" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Enviar</button>

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
                    </form>
                    </article>
                @endisset
            @endif
        @endif
    @endif


    @isset($reviews)
    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{$reviews->count()}} valoraciones</p>
                @foreach ($reviews as $review)
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
    @else
        <div class="card">
            <div class="card-body">
                <p class="text-gray-800 text-xl">No hay valoraciones</p>
            </div>
        </div>
    @endisset
</section>
