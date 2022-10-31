
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="pb-4 pl-2 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative mt-1">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input wire:model="search" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar recetas">
                <a href="{{route('usuario.recipes.create')}}" class="btn btn-secondary btn-sm float-right">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nueva Receta</button>
                </a>
            </div>
        </div>

@if($recipes->count())
    <div class="card-body">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">ID</th>
                    <th scope="col" class="py-3 px-6">Titulo</th>
                    <th colspan="2" class="p-4"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($recipes as $recipe)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6">{{ $recipe->id }}</td>
                        <td class="py-4 px-6">{{ $recipe->title }}</td>
                        <td width="10px" class="py-4 px-6">
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('usuario.recipes.edit', $recipe) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST">
                                @csrf
                               @method('delete')

                                <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@else
    <div class="card-body">
        <strong>There is no recipe</strong>
    </div>
@endif

</div>