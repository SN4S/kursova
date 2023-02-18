<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug=$slug;
    }

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Products');
        session()->flash('success_message','Item added to Cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $newp=Products::latest()->take(15)->get();
        $product = Products::where('slug',$this->slug)->first();
        $rel_product=Products::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        $categories = Category::orderBy('name','ASC')->get();

        return view('livewire.details-component',['product'=>$product,'categories'=>$categories,'rel'=>$rel_product,'new'=>$newp]);
    }
}

