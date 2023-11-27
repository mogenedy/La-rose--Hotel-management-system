<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $profileData = Auth::user();
        return view('frontend.dashboard.user_profile', compact('profileData'));
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


    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification=array(
            'message'=>'User logged out Successfully',
            'alert-type'=>'success'
         );

        return redirect('/login')->with($notification);;
    }

    public function userChangePassword(){
        return view('frontend.dashboard.user_change_password');
    }

    public function PasswordChangeStore(Request $request){
        //validation
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);
        //check old password
        if(!Hash::check($request->old_password, Auth::user()->password)){

            $notification=array(
                'message'=>'Old password does not match',
                'alert-type'=>'error'
             );
            return back()->with($notification);
        }
                //update new password
                User::whereId(Auth::user()->id)->update([
                    'password'=>Hash::make($request->new_password)
                ]);
                $notification=array(
                    'message'=>'password has changed',
                    'alert-type'=>'success'
                 );
                return back()->with($notification);
    }

}