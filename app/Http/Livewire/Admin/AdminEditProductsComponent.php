<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Device;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Cart;

class AdminEditProductsComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $manufacturer;
    public $price;
    public $stock_status = 'instock';
    public $qauntity;
    public $image;
    public $category_id;
    public $device_id;
    public $newimage;

    public function mount($product_id)
    {
        $product = Products::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->manufacturer = $product->manufacturer;
        $this->price = $product->price;
        $this->stock_status = $product->stock_status;
        $this->qauntity = $product->qauntity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->device_id = $product->device_id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
            'stock_status' => 'required',
            'qauntity' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'device_id' => 'required'
        ]);
        $product = Products::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->manufacturer = $this->manufacturer;
        $product->price = $this->price;
        $product->stock_status = $this->stock_status;
        $product->qauntity = $this->qauntity;
        if ($this->newimage) {
            unlink('assets/imgs/products/'.$product->image);
            $imageName = Carbon::now()->timestamp.'.'. $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->device_id = $this->device_id;
        $product->save();
        session()->flash('message', 'Your product was updated');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $devices = Device::orderBy('manufactor_id', 'ASC')->get();
        return view('livewire.admin.admin-edit-products-component', ['categories' => $categories, 'devices' => $devices]);
    }
}
