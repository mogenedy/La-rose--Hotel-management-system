<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded=[];

    public function type(){
        return $this->belongsTo(RoomType::class, 'roomtype_id', 'id');
     }
}