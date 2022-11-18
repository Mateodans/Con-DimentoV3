    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="block p-2 pl-10 w-80 text-sm text-gray-900  rounded-lg   focus:ring-blue-500 focus:border-blue-500 ">
    @livewire('search')
</div>
    <a href="{{route('usuario.recipes.create')}}" class="btn btn-secondary btn-sm float-right">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nueva Receta</button>
    </a>
</div>
@if($recipes->count())
    <div class="card-body">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="m-2">
                    <th scope="col" class="py-3 px-6">Titulo</th>
                    <th colspan="2" class="p-4"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($recipes as $recipe)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6">{{ $recipe->title }}</td>
                        <td width="10px" class="py-4 px-6">
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('usuario.recipes.edit', $recipe) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('usuario.recipes.index', $recipe) }}" method="POST">
                                @csrf
                               @method('delete')

                                <button class="font-medium m-2 text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Estas seguro de que queres borrar?')" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@else
    <div class="card-body">
        <strong>Aun no hay ninguna receta</strong>
    </div>
@endif

</div>