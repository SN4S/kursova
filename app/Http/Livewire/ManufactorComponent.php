<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Device;
use App\Models\Manufactor;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ManufactorComponent extends Component
{
    public $pageSize=6;
    //public $orderBy = "Default Sorting";

    public function changePageSize($size){
        $this->pageSize=$size;
    }
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        $devices = Device::get();
        $manufactors = Manufactor::orderBy('name','ASC')->paginate($this->pageSize);
        $new_products = Products::latest()->take(3)->get();

        return view('livewire.manufactor-component',['manufactors'=>$manufactors,'categories' => $categories,'new_products' => $new_products]);
    }
}
