<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'daily_value',
        'km_initial'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
}
