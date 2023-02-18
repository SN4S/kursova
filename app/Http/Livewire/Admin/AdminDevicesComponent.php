<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AdminDevicesComponent extends Component
{use WithPagination;

    public $category_id;

    public function deleteCategory(){

        $category = Device::find($this->category_id);

        $category->delete();
        session()->flash('message','Device was deleted');
    }

    public function render()
    {
        $categories = Device::orderBy('id')->paginate(10);
        return view('livewire.admin.admin-devices-component',['categories'=>$categories]);
    }
}
