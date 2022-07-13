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
        'user_id', 'room_is',
        'instance_id', 'food_id', 'drink_id',
        'start_date', 'end_date', 'start_time',
        'end_time'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
    public function instance()
    {
        return $this->belongsTo('App\Models\Instance');
    }
}
