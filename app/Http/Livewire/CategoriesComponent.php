<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoriesComponent extends Component
{
    public $pageSize=6;

    public function changePageSize($size){
        $this->pageSize=$size;
    }


    public function render()
    {
        $new_products = Products::latest()->take(3)->get();
        $categories = Category::orderBy('name','ASC')->paginate($this->pageSize);
        return view('livewire.categories-component',['categories'=>$categories,'new_products' => $new_products]);
    }
}
