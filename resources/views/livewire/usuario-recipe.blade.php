
<x-app-layout>

    <div class="card">
        <div class="card-body">
            <button type="submit" onclick="return confirm('¿Quiere Eliminar la receta?')" class=" text-white btn bg-red-800">Eliminar</button>

    <x-recipes-index :recipes="$recipes" />
        </div>
    </div>
</x-app-layout>
