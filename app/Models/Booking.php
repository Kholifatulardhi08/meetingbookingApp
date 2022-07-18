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
        'name', 'snack', 'user_id', 'room_id', 'instance_id',
        'start_date', 'end_date', 'start_time',
        'end_time'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function Room()
    {
        return $this->belongsToMany(Room::class);
    }
    public function instance()
    {
        return $this->belongsToMany(Instance::class);
    }
}
