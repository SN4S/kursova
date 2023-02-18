<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderComponent extends Component
{
    public $order_id=7;
    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order->status = 5;
        $order->save();
        session()->flash('success_message','Order was canceled');
    }

    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();
        $order_product = OrderProduct::orderBy('id')->get();

        return view('livewire.user.user-order-component',['orders'=>$orders,'order_products'=>$order_product]);
    }
}
