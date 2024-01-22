<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function RoomEdit($id){
        $editData=Room::find($id);

return view('backend.allroom.rooms.edit_rooms',compact('editData'));
    }
}