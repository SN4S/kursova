<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class CheckoutComponent extends Component
{

    public $first_name;
    public $second_name;
    public $fathership;
    public $address;
    public $number;
    public $email;
    public $payment;
    public $order_id;


    public function mount(){
        if(Auth::user()) {
            $this->first_name = Auth::user()->first_name;
            $this->second_name = Auth::user()->second_name;
            $this->fathership = Auth::user()->fathership;
            $this->address = Auth::user()->address;
            $this->number = Auth::user()->phone;
            $this->email = Auth::user()->email;
        }
    }
    public function checkout(){
        $this->validate(
            [
                'first_name'=>'required',
                'second_name'=>'required',
                'address'=>'required',
                'number'=>'required',
                'email'=>'required',
            ]
        );
        $order = new Order();
        if(Auth::user()) {
            $order->user_id = Auth::user()->id;
        }
        $order->first_name=$this->first_name;
        $order->second_name=$this->second_name;
        $order->fathership=$this->fathership;
        $order->address=$this->address;
        $order->number=$this->number;
        $order->email=$this->email;
        $order->status=1;
        $order->payment=$this->payment;
        $order->order_price=Cart::total();
        $this->order_id=$order->id;
        $order->save();
        $id = $order->id;
        foreach (Cart::content() as $item){
            $order_product = new OrderProduct();
            $order_product->order_id=$id;
            $order_product->product_slug=$item->model->id;
            $order_product->count=$item->qty;
            $order_product->price=$item->model->price;
            $order_product->image=$item->model->image;
            $order_product->product_id=$item->model->slug;
            $order_product->name=$item->model->name;
            $order_product->save();
        }
        session()->flash('success_message','Order was sended');
        Cart::destroy();
        return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
