<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\bookArea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


    // books area methods
    public function BookArea(){
        $book=BookArea::find(1);
        return view('backend.book_area.all_book_areas',compact('book'));
    }


    
    public function BookAreaUpdate(Request $request){
        $book_id=$request->id;
        $book_id=BookArea::find($book_id);
        $book_id->short_title=$request->short_title;
        $book_id->main_title=$request->main_title;
        $book_id->short_description	=$request->short_description;
        $book_id->link_url=$request->link_url;

        if($request->hasFile('image')){
            $image=$request->image;
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('upload/book_images',$image_name);
            $book_id->image=$image_name;
            $book_id->save();

        $notification=array(
            'message'=>'Book Area Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('book.area')->with($notification);

     }else{
        $book_id->short_title=$request->short_title;
        $book_id->main_title=$request->main_title;
        $book_id->short_description	=$request->short_description;
        $book_id->link_url=$request->link_url;
        $book_id->save();
     }

     $notification=array(
        'message'=>'Book Area Updated Successfully without image',
        'alert-type'=>'success'
    );
    return redirect()->route('book.area')->with($notification);
    }//end method

}
