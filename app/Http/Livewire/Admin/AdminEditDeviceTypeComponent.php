<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\DeviceType;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminEditDeviceTypeComponent extends Component
{
    use WithFileUploads;
    public $dev_type_id;
    public $name;
    public $description;
    public $newimage;
    public $image;


    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'image'=>'required'
        ]);
    }

    public function updateCategory(){
        $this->validate(
            [
                'name'=>'required',
                'image'=>'required'
            ]
        );
        $category = DeviceType::find($this->dev_type_id);
        $category->name=$this->name;
        $category->description=$this->description;
        if ($this->newimage) {
            unlink('assets/imgs/device_type/'.$category->image);
            $imageName = Carbon::now()->timestamp.'.'. $this->newimage->extension();
            $this->newimage->storeAs('device_type', $imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message','Category updated');
    }
    public function mount($dev_type_id){
        $category = DeviceType::find($dev_type_id);
        $this->dev_type_id=$category->id;
        $this->name=$category->name;
        $this->image = $category->image;
        $this->description=$category->description;
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-device-type-component');
    }
}
