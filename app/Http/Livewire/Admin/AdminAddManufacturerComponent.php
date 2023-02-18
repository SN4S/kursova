<?php

namespace App\Http\Livewire\Admin;

use App\Models\DeviceType;
use App\Models\Manufactor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminAddManufacturerComponent extends Component
{use WithFileUploads;
    public $name;
    public $slug;
    public $logo;
    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
    public function storeman(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'logo' => 'required',
        ]);
        $product = new Manufactor();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $imageName = Carbon::now()->timestamp.'.'.$this->logo->extension();
        $this->logo->storeAs('manufactor',$imageName);
        $product->logo = $imageName;
        $product->save();
        session()->flash('message','Your Manufactor type was added');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-manufacturer-component');
    }
}
