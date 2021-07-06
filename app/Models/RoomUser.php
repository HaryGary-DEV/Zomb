<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    use HasFactory;

    protected $table = 'room_user';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id' , 'user_id');
    }

    public function room()
    {
        return $this->hasMany(Room::class, 'id', 'room_id');
    }
}
