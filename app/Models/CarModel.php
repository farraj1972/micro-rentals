<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'doors', 'seats', 'airbag', 'abs'];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }

}
