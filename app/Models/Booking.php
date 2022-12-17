<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Amenities;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }

    public function amenities(){
        return $this->belongsTo(Amenities::class,'amenities_id');
    }

    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function approvedBy(){
        return $this->belongsTo(User::class,'approved_by');
    }
}
