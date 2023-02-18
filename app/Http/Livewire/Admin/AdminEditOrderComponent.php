<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AdminEditOrderComponent extends Component
{
    public $order_id;
    public $status;

    public function updated($fields){
        $this->validateOnly($fields,[
            'status'=>'required'
        ]);
    }

    public function updateCategory(){
        $category = Order::find($this->order_id);
        $category->status=$this->status;
        $category->save();
        session()->flash('message','Category updated');
    }
    public function mount($order_id){
        $category = Order::find($order_id);
        $this->category_id=$category->id;
        $this->status=$category->status;
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-order-component');
    }
}
