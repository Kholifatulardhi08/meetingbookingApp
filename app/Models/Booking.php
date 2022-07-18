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
        'name',
        'snack',
        'user_id',
        'room_id',
        'instance_id',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Room()
    {
        return $this->belongsTo(Room::class);
    }
    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }
}
