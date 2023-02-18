<?php

namespace App\Http\Livewire;

use App\Models\Manufactor;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class HomeComponent extends Component
{
    public function render()
    {
        $newp=Products::latest()->take(15)->get();
        $manuf = Manufactor::take(10)->get();
        return view('livewire.home-component',['newp' => $newp,'manuf'=>$manuf]);
    }
}
