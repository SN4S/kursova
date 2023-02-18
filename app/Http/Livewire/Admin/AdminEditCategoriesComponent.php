<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminEditCategoriesComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $short_description;
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
        $category = Category::find($this->category_id);
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->short_description=$this->short_description;
        if ($this->newimage) {
            unlink('assets/imgs/categories/'.$category->image);
            $imageName = Carbon::now()->timestamp.'.'. $this->newimage->extension();
            $this->newimage->storeAs('categories', $imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message','Category updated');
    }
    public function mount($category_id){
        $category = Category::find($category_id);
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;
        $this->image = $category->image;
        $this->short_description=$category->short_description;
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-categories-component');
    }
}
