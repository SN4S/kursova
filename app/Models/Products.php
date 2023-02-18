<?php

namespace App\Models;

use http\Exception\BadUrlException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table='products';
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function device(){
        return $this->belongsTo(Device::class,'device_id');
    }
}
