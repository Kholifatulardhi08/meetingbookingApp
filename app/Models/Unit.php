<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function unit()
    {
        //return $this->hasOne();
        return $this->hasMany(Booking::class, 'name');

    }
}
