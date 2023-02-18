<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class HeaderSearchComponent extends Component
{
    public function render()
    {
        return view('livewire.header-search-component');
    }
}
