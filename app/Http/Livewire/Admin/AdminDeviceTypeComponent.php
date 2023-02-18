<?php

namespace App\Http\Livewire\Admin;

use App\Models\Device;
use App\Models\DeviceType;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AdminDeviceTypeComponent extends Component
{use WithPagination;

    public $category_id;

    public function deleteCategory(){

        $category = DeviceType::find($this->category_id);

        $category->delete();
        session()->flash('message','Device type was deleted');
    }

    public function render()
    {
        $categories = DeviceType::orderBy('id')->paginate(10);
        return view('livewire.admin.admin-device-type-component',['categories'=>$categories]);
    }
}
