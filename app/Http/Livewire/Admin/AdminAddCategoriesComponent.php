<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminAddCategoriesComponent extends Component
{ use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
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

    public function storeCategory(){
        $this->validate(
            [
                'name'=>'required',
                'slug'=>'required',
                'image'=>'required'
            ]
        );
        $category = new Category();
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->short_description=$this->short_description;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $category->image = $imageName;
        $category->save();
        session()->flash('message','Category added');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-categories-component');
    }
}
