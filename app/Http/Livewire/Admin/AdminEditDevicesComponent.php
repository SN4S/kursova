<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Device;
use App\Models\DeviceType;
use App\Models\Manufactor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminEditDevicesComponent extends Component
{use WithFileUploads;
    public $device_id;
    public $name;
    public $manufactor_id;
    public $device_type_id;
    public $description;
    public $newimage;
    public $image;


    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'manufactor_id'=>'required',
            'device_type_id'=>'required',
            'image'=>'required'
        ]);
    }

    public function updateCategory(){
        $this->validate(
            [
                'name'=>'required',
                'manufactor_id'=>'required',
                'device_type_id'=>'required',
                'image'=>'required'
            ]
        );
        $category = Device::find($this->device_id);
        $category->name=$this->name;
        $category->manufactor_id=$this->manufactor_id;
        $category->device_type_id=$this->device_type_id;

        $category->description=$this->description;
        if ($this->newimage) {
            unlink('assets/imgs/devices/'.$category->image);
            $imageName = Carbon::now()->timestamp.'.'. $this->newimage->extension();
            $this->newimage->storeAs('devices', $imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message','Device updated');
    }
    public function mount($device_id){
        $category = Device::find($device_id);
        $this->device_id=$category->id;
        $this->name=$category->name;
        $this->manufactor_id=$category->manufactor_id;
        $this->device_type_id=$category->device_type_id;
        $this->image = $category->image;
        $this->description=$category->description;
    }
    public function render()
    {
        $dev_type = DeviceType::get();
        $manufactor = Manufactor::get();
        return view('livewire.admin.admin-edit-devices-component',['dev_type'=>$dev_type,'manufactor'=>$manufactor]);
    }
}
