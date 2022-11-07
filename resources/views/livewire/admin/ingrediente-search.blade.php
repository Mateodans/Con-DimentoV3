<div>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el email o nombre de un usuario">
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->id}}</td>
                            <td>{{$ingredient->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.ingredients.edit', $ingredient)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.ingredients.destroy', $ingredient)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Borrador</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
