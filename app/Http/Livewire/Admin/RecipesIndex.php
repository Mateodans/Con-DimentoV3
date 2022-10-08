<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Recipe;
use Livewire\WithPagination;

class RecipesIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $recipes = Recipe::where('user_id', auth()->user()->id)
                        ->where('title', 'LIKE', '%' . $this->search . '%')
                        ->latest('id')
                        ->get();

        return view('livewire.admin.recipes-index', compact('recipes'));



    }
}
