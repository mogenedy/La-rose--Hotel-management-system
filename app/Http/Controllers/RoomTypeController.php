<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function RoomTypeList(){
        $roomptypelist = RoomType::orderBy('id','desc')->get();
        return view('backEnd.allroom.roomtype.viewroomtype',compact('roomptypelist'));
    }

    public function AddRoomType(){
        return view('backEnd.allroom.roomtype.add_roomtype');

    }

    public function StoreRoomType(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        $roomType_id=RoomType::insertGetId([
            // Get inserted ID from database
            'name'=>$request->name,
        ]);

        Room::insert([
            // Associate new room type with rooms table
            'roomtype_id' => $roomType_id
        ]);





        $notification=array(
            'message'=>'Room Type Added Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }
}
