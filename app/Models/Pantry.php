<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Meals;
use App\Models\Drink;

class Pantry extends Model
{
    use HasFactory;

    protected $fillable = ['meal_id', 'drink_id', 'booking_id'];

    public function meal()
    {
        return $this->belongsTo(Meals::class);
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
