<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\recipe;

class Search extends Component
{

    public $search;

    public function render()
    {

        return view('livewire.search');
    }

    public function getResultsProperty(){
        return recipe::where('title', 'LIKE', '%'. $this->search .'%')->where('status', 2)->take(8)->get();
    }

}
