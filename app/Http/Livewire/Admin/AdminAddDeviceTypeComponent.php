<?php

namespace App\Http\Livewire\Admin;

use App\Models\DeviceType;
use App\Models\Products;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminAddDeviceTypeComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $image;

    public function storeDevtype(){
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'image' => 'required',
        ]);
        $product = new DeviceType();
        $product->name = $this->name;
        $product->description = $this->description;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('device_type',$imageName);
        $product->image = $imageName;
        $product->save();
        session()->flash('message','Your device type was added');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-device-type-component');
    }
}
