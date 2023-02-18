<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShopComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::middleware('auth')->group(function () {
});


Route::get('/',HomeComponent::class)->name("home.index");
Route::get('/products',ShopComponent::class)->name("shop");
Route::get('/product/{slug}',\App\Http\Livewire\DetailsComponent::class)->name("product.details");
Route::get('/category/{slug}',\App\Http\Livewire\CategoryComponent::class)->name("product.category");
Route::get('/search',\App\Http\Livewire\SearchComponent::class)->name("product.search");
Route::get('/categories',\App\Http\Livewire\CategoriesComponent::class)->name("categories");
Route::get('/manufactors',\App\Http\Livewire\ManufactorComponent::class)->name("manufactors");
Route::get('/manufactors/{slug}',\App\Http\Livewire\DevicesComponent::class)->name("manufactors.devices");
Route::get('/manufactors/{slug}/{id}',\App\Http\Livewire\DevicesPartsComponent::class)->name("manufactors.devices.parts");


Route::get('/cart',CartComponent::class)->name("shop.cart");
Route::get('/checkout',CheckoutComponent::class)->name("checkout");


Route::middleware(['auth'])->group(function (){
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', \App\Http\Livewire\User\UserOrderComponent::class)->name('user.orders');
   // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','authadmin'])->group(function (){
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/order/edit/{order_id}', \App\Http\Livewire\Admin\AdminEditOrderComponent::class)->name('admin.order.edit');


    Route::get('/admin/categories', \App\Http\Livewire\Admin\AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add', \App\Http\Livewire\Admin\AdminAddCategoriesComponent::class)->name('admin.category.add');
    Route::get('/admin/categories/edit/{category_id}', \App\Http\Livewire\Admin\AdminEditCategoriesComponent::class)->name('admin.category.edit');

    Route::get('/admin/products', \App\Http\Livewire\Admin\AdminProductsComponent::class)->name('admin.products');
    Route::get('/admin/products/add', \App\Http\Livewire\Admin\AdminAddProductsComponent::class)->name('admin.products.add');
    Route::get('/admin/products/edit/{product_id}', \App\Http\Livewire\Admin\AdminEditProductsComponent::class)->name('admin.products.edit');

    Route::get('/admin/devices', \App\Http\Livewire\Admin\AdminDevicesComponent::class)->name('admin.devices');
    Route::get('/admin/devices/add', \App\Http\Livewire\Admin\AdminAddDevicesComponent::class)->name('admin.devices.add');
    Route::get('/admin/devices/edit/{device_id}', \App\Http\Livewire\Admin\AdminEditDevicesComponent::class)->name('admin.devices.edit');

    Route::get('/admin/manufacturer', \App\Http\Livewire\Admin\AdminManufacturerComponent::class)->name('admin.manufacturer');
    Route::get('/admin/manufacturer/add', \App\Http\Livewire\Admin\AdminAddManufacturerComponent::class)->name('admin.manufacturer.add');
    Route::get('/admin/manufacturer/edit/{manufacturer_id}', \App\Http\Livewire\Admin\AdminEditManufacturerComponent::class)->name('admin.manufacturer.edit');

    Route::get('/admin/device_type', \App\Http\Livewire\Admin\AdminDeviceTypeComponent::class)->name('admin.device-type');
    Route::get('/admin/device_type/add', \App\Http\Livewire\Admin\AdminAddDeviceTypeComponent::class)->name('admin.device-type.add');
    Route::get('/admin/device_type/edit/{dev_type_id}', \App\Http\Livewire\Admin\AdminEditDeviceTypeComponent::class)->name('admin.device-type.edit');

});

require __DIR__.'/auth.php';
