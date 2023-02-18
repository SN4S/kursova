<?php

namespace App\Http\Livewire\Admin;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AdminProductsComponent extends Component
{
    use WithPagination;

    public $product_id;

    public function deleteProduct(){

        $product = Products::find($this->product_id);
        unlink('assets/imgs/products/'.$product->image);

        $product->delete();
        session()->flash('message','Product was deleted');
    }
    public function render()
    {
        $products = Products::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-products-component',['products'=>$products]);
    }
}
