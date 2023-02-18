<?php

namespace App\Http\Livewire\Admin;

use App\Models\DeviceType;
use App\Models\Manufactor;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class AdminManufacturerComponent extends Component
{use WithPagination;

    public $category_id;

    public function deleteCategory(){

        $category = Manufactor::find($this->category_id);

        $category->delete();
        session()->flash('message','Manufactor was deleted');
    }

    public function render()
    {
        $categories = Manufactor::orderBy('id')->paginate(10);
        return view('livewire.admin.admin-manufacturer-component',['categories' => $categories]);
    }
}
