<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Meals extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qty'
    ];

    public function booking()
    {
        return $this->hasOne('App\Models\Booking', 'meals_id');
    }
}
