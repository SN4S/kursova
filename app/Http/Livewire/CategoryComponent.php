<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    public $pageSize=6;
    public $slug;
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

    public function mount($slug){
        $this->slug=$slug;
    }

    public function render()
    {
        $category= Category::where('slug',$this->slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $categories = Category::orderBy('name','ASC')->get();

        if($this->orderBy=='Price: Low to High'){
            $products = Products::where('category_id',$category_id)->orderBy('price','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Price: High to Low'){
            $products = Products::where('category_id',$category_id)->orderBy('price','DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Date: New to Old'){
            $products = Products::where('category_id',$category_id)->orderBy('created_at','ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Date: Old to New'){
            $products = Products::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        else{
            $products = Products::where('category_id',$category_id)->paginate($this->pageSize);
        }

        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name]);
    }
}
