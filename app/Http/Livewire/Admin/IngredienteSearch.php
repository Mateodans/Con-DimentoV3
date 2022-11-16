<?php

namespace App\Http\Livewire\Admin;

use App\Models\ingredient;
use Livewire\Component;
use Livewire\WithPagination;

class IngredienteSearch extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $ingredients = ingredient::where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.ingrediente-search ', compact('ingredients'));
    }
}
