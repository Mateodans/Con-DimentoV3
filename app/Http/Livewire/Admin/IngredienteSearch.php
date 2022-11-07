<?php

namespace App\Http\Livewire\Admin;

use App\Models\ingredient;
use Livewire\Component;

class IngredienteSearch extends Component
{

    public $search;

    public function render()
    {
        $ingredients = ingredient::where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.ingrediente-search ', compact('ingredients'));
    }
}
