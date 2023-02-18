<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Manufactor;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AdminDashboardComponent extends Component
{
    public $order_id;
    public $order_wid;
    public $product_id;
    public $device_type_id;
    public $device_id;
    public $man_id;
    public $category_id;
    public $user_id;
    public $status;
    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order->status = 5;
        $order->save();
        session()->flash('success_message','Order was canceled');
    }

    public function changeStatus(){

        $product = Order::find($this->order_wid);
        $product->status = $this->status;
        $product->save();
    }

    public function render()
    {
        $orders = Order::orderBy('id')->paginate(15);
        $order_product = OrderProduct::where('order_id',$this->order_id)->orderBy('id')->get();
        $categories = Category::orderBy('id')->paginate(10);
        $products = Products::orderBy('created_at','DESC')->paginate(10);
        $dev_types = DeviceType::orderBy('id')->paginate(10);

        return view('livewire.admin.admin-dashboard-component',['dev_types'=>$dev_types,'orders' => $orders,'order_products'=>$order_product,'products'=>$products,'categories'=>$categories]);
    }
}
