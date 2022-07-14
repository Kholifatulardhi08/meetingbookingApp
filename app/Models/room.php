<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;


class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'capacity'];

}
