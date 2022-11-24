<div class="card">
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el email o nombre de un usuario">
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
                @if($recipe->user_id == Auth::user()->id)
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

                                <button class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Estas seguro de que queres borrar?')" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$recipes->links()}}
    </div>

@else
    <div class="card-body">
        <strong>Aun no hay ninguna receta</strong>
    </div>
@endif
</div>
