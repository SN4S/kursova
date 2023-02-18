<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Manufactor;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $pageSize=6;
    public $orderBy = "Default Sorting";

    public function changePageSize($size){
        $this->pageSize=$size;
    }

    public function changeOrderBy($order){
        $this->orderBy=$order;
    }

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Products');
        session()->flash('success_message','Item added to Cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        if($this->orderBy=='Price: Low to High'){
            $products = Products::orderBy('price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Price: High to Low'){
            $products = Products::orderBy('price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Date: New to Old'){
            $products = Products::orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Date: Old to New'){
        $products = Products::orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Products::paginate($this->pageSize);
        }
        $new_products = Products::latest()->take(3)->get();

        $categories = Category::orderBy('name','ASC')->get();
        $manufactur = Manufactor::take(15)->get();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories,'new_products'=>$new_products,'man'=>$manufactur]);
    }
}
