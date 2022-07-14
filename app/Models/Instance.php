<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;


class Instance extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

}
