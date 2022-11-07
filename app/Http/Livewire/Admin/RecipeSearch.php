<?php

namespace App\Http\Livewire\Admin;

use App\Models\recipe;
use Livewire\Component;

class RecipeSearch extends Component
{

    public $search;

    public function render()
    {

        $recipes = recipe::where('title', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.recipe-search', compact('recipes'));
    }
}
