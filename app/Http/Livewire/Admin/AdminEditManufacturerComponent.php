<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Manufactor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminEditManufacturerComponent extends Component
{
    use WithFileUploads;
    public $manufacturer_id;
    public $name;
    public $slug;
    public $newimage;
    public $image;

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required'
        ]);
    }

    public function updateCategory(){
        $this->validate(
            [
                'name'=>'required',
                'slug'=>'required',
                'image'=>'required'
            ]
        );
        $category = Manufactor::find($this->manufacturer_id);
        $category->name=$this->name;
        $category->slug=$this->slug;
        if ($this->newimage) {
            unlink('assets/imgs/manufactor/'.$category->logo);
            $imageName = Carbon::now()->timestamp.'.'. $this->newimage->extension();
            $this->newimage->storeAs('manufactor', $imageName);
            $category->logo = $imageName;
        }
        $category->save();
        session()->flash('message','Manufactor updated');
    }
    public function mount($manufacturer_id){
        $category = Manufactor::find($manufacturer_id);
        $this->manufacturer_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;
        $this->image = $category->logo;
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-manufacturer-component');
    }
}
