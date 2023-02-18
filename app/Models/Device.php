<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    public $table = 'device';
    use HasFactory;

    public function manufactor(){
        return $this->belongsTo(Manufactor::class,'manufactor_id');
    }
    public function device_Type(){
        return $this->belongsTo(DeviceType::class,'device_type_id');
    }
}
