<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $profileData=User::find($id);

        return view('frontend.dashboard.user_profile',compact('profileData'));
    }

    public function userStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);
        $data->name=$request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->address= $request->address;

    $photo=$request->photo;
    $photo_name=time().'.'.$photo->getClientOriginalExtension();
    $request->photo->move('upload/user_images',$photo_name);
    $data->photo=$photo_name;
    $data->save();

// add toaster notifcation

 $notification=array(
    'message'=>'Profile Updated Successfully',
    'alert-type'=>'success'
 );
     return redirect()->back()->with($notification);
    }

}