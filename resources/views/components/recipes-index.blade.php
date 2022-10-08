
<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Enter the name of the recipe">
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
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.recipes.edit', $recipe) }}">Edit</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST">
                                @csrf
                               @method('delete')

                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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