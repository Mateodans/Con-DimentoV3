<?php

namespace App\Http\Livewire\Admin;

use App\Models\recipe;
use Livewire\Component;
use Livewire\WithPagination;
class RecipeSearch extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $recipes = recipe::where('title', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.recipe-search', compact('recipes'));
    }
}
