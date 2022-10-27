<x-app-layout>

    {{-- <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
    data-preference-id="213429554-9f248fc2-f7db-49d7-9b0e-12355cfe3b5e" data-source="button">
    </script>

    <a href='https://cafecito.app/con-dimento' rel='noopener' target='_blank'><img srcset='https://cdn.cafecito.app/imgs/buttons/button_1.png 1x, https://cdn.cafecito.app/imgs/buttons/button_1_2x.png 2x, https://cdn.cafecito.app/imgs/buttons/button_1_3.75x.png 3.75x' src='https://cdn.cafecito.app/imgs/buttons/button_1.png' alt='Invitame un café en cafecito.app' /></a> --}}

    <div class="container py-8 min-h-screen mb-500">
    <div id="control-carousel" class="relative rounded-lg" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 shadow-xl">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <span class="absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/storage/recipes/PyzhTErDM2YbtEkd65JLUZ4qslaUtcgZzQq99BNS.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/storage/recipes/yIziWBZV1MozbPNwpDPm4LRgd1sF4D7VwYy4JY9k.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js" ></script>

<div class="text-4xl text-center mt-10 font-semibold text-gray-700">
    <h1>
        Todas Nuestras Recetas
    </h1>
</div>

    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
        @foreach ($recipes as $recipe)
        <div>
        <a href="{{route('recipes.show', $recipe)}}">
            <div class="rounded overflow-hidden shadow-lg transition-shadow ease-in-out duration-200 hover:shadow-2xl ">
            <article class="w-full h-80 bg-cover bg-center rounded-lg @if($loop->first) md:col-span-2 @endif" style="background-image: url(
                @if($recipe->image) {{Storage::url($recipe->image->url)}} @else https://cdn.pixabay.com/photo/2017/06/06/22/37/italian-cuisine-2378729_1280.jpg @endif)"></article>
            <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$recipe->title}}</div>
            </div>
            </a>
            <div class="px-6 pt-4 pb-2">
                @foreach ($recipe->ingredients as $ingredient)
                    <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{route('recipes.show', $ingredient)}}">{{$ingredient->name}}</a>
                @endforeach
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</x-app-layout>