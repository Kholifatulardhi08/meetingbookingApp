<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;
use App\Models\Instance;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'snack',
        'start_date', 'end_date', 'start_time',
        'end_time'
    ];
}
