<?php

namespace App\Http\Livewire\Admin;

use App\Models\Device;
use App\Models\DeviceType;
use App\Models\Manufactor;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminAddDevicesComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $manufacturer_id;
    public $device_type_id;
    public $image;


    public function storeProduct(){
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'manufacturer_id' => 'required',
            'image' => 'required',
        ]);
        $product = new Device();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->manufactor_id = $this->manufacturer_id;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('devices',$imageName);
        $product->image = $imageName;
        $product->device_type_id=$this->device_type_id;
        $product->save();
        session()->flash('message','Your device was added');
    }
    public function render()
    {
        $devt = DeviceType::get();
        $man = Manufactor::get();
        return view('livewire.admin.admin-add-devices-component',['devt' => $devt,'man' => $man]);
    }
}
