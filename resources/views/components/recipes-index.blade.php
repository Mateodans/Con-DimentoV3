
<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Enter the name of the recipe">
    </div>

@if($recipes->count())
    <div class="card-body">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Titulo</th>
                    <th colspan="2" class="p-4"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($recipes as $recipe)
                    <tr class="  bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td>{{ $recipe->id }}</td>
                        <td>{{ $recipe->title }}</td>
                        <td width="10px">
                            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('admin.recipes.edit', $recipe) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST">
                                @csrf
                               @method('delete')

                                <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
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