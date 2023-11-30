<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function AllTeam(){
        $team=Team::all();
        return view('backend.team.all_team',compact('team'));
    }
    public function AddTeam(){
        return view('backend.team.add_team');
    }

    public function TeamStore(Request $request){
        $request->validate([
            'name'=>'required',
            'position'=>'required'
        ]);
        $image=$request->image;
       $image_name=time().'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(550,670)->save('upload/team_images/'.$image_name);
       $request->image->move('upload/team_images', $image_name);

        Team::insert([
            'name'=>$request->name,
            'position'=>$request->position,
            'facebook'=>$request->facebook,
            'image'=>$image_name,
            'created_at'=>now(),
        ]);
        // add toaster notifcation

 $notification=array(
    'message'=>'Team Updated Successfully',
    'alert-type'=>'success'
 );

 return redirect()->route('all.team')->with($notification);



    }
     public function TeamEdit($id){
        $team=Team::find($id);
             return view('backend.team.edit_team',compact('team'));
     }

     public function TeamUpdate(Request $request ,$id){
        $team=Team::find($id);
        $team->name=$request->name;
        $team->position=$request->position;
        $team->facebook=$request->facebook;

        if($request->hasFile('image')){
            $image=$request->image;
            $image_name=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(550,670)->save('upload/team_images/'.$image_name);
            $request->image->move('upload/team_images', $image_name);
            $team->image=$image_name;
            $team->save();
        // add toaster notifcation

    $notification=array(
        'message'=>'Team Updated Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.team')->with($notification);
     }else{
        $team=Team::find($id);
        $team->name=$request->name;
        $team->position=$request->position;
        $team->facebook=$request->facebook;
        $team->save();
     }
     $notification=array(
        'message'=>'Team Updated Successfully without image',
        'alert-type'=>'success'
    );
    return redirect()->route('all.team')->with($notification);
    }



    public function TeamDelete($id){
        $team=Team::find($id);
        $team->delete();
        // add toaster notifcation

    $notification=array(
        'message'=>'Team Deleted Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.team')->with($notification);
    }

}