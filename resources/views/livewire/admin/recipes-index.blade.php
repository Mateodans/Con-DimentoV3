<div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Introduzca el nombre de la receta">
        </div>

    @if($recipes->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td>{{ $recipe->id }}</td>
                            <td>{{ $recipe->title }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.recipes.edit', $recipe) }}">Editar</a>
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
            <strong>Aqui no hay una receta aun</strong>
        </div>
    @endif

    <div class="card-footer">
        {{$recipes->links()}}
    </div>
</div>

