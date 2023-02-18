<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Device;
use App\Models\Manufactor;
use App\Models\Products;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class DevicesPartsComponent extends Component
{
    public $pageSize =6;
    public $slug;
    public function mount($id,$slug){
        $this->slug=$slug;
        $this->id=$id;
    }

    public $orderBy = "Default Sorting";

    public function changePageSize($size){
        $this->pageSize=$size;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Products');
        session()->flash('success_message','Item added to Cart');
        return redirect()->route('shop.cart');
    }
    public function changeOrderBy($order){
        $this->orderBy=$order;
    }
    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        $new_products = Products::latest()->take(3)->get();
        $device = Device::where('id',$this->id)->first();
        $manufactor = Manufactor::where('slug',$this->slug)->first();

        $products = Products::where('device_id',$this->id)->paginate($this->pageSize);
        return view('livewire.devices-parts-component',['products' => $products,'device'=>$device,'categories' => $categories,'manuf'=>$manufactor]);
    }
}
