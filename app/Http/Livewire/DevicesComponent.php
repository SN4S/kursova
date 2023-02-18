<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Device;
use App\Models\Manufactor;
use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class DevicesComponent extends Component
{
    public $slug;
    public $pageSize=6;
    public function mount($slug){
        $this->slug=$slug;
    }

    public function changePageSize($size){
        $this->pageSize=$size;
    }

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        $new_products = Products::latest()->take(3)->get();

        $manufactor = Manufactor::where('slug',$this->slug)->first();
        $man_id = $manufactor->id;
        $devices= Device::where('manufactor_id',$man_id)->paginate($this->pageSize);
        return view('livewire.devices-component',['devices' => $devices,'categories' => $categories,'new_products' => $new_products,'man'=>$manufactor]);
    }
}
