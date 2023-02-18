<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $pageSize=6;

    public $q;
    public $search_term;
    public $orderBy = "Default Sorting";

    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term='%'.$this->q.'%';
    }
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
            $products = Products::where('name','like',$this->search_term)->orderBy('price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Price: High to Low'){
            $products = Products::where('name','like',$this->search_term)->orderBy('price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Date: New to Old'){
            $products = Products::where('name','like',$this->search_term)->orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Date: Old to New'){
            $products = Products::where('name','like',$this->search_term)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Products::where('name','like',$this->search_term)->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories]);
    }
}
