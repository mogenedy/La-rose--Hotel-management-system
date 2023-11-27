<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function adminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id=Auth::user()->id; //check our uer is logged or not
        $profileData=User::find($id); //get user data
        return view('admin.admin_profile_view',compact('profileData')); //pass data to view
    }

    public function AdminProfileStore(Request $request){
        $id=Auth::user()->id;//check our uer is logged or not
        $data=User::find($id);
        $data->name=$request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->address= $request->address;

    $photo=$request->photo;
    $photo_name=time().'.'.$photo->getClientOriginalExtension();
    $request->photo->move('upload/admin_images',$photo_name);
    $data->photo=$photo_name;
    $data->save();

// add toaster notifcation

 $notification=array(
    'message'=>'Profile Updated Successfully',
    'alert-type'=>'success'
 );

     return redirect()->back()->with($notification);

    }

    public function AdminPasswordChange(){
        $id=Auth::user()->id; //check our uer is logged or not
        $ProfileData=User::find($id); //get user data
        return view('admin.admin_password_change',compact('ProfileData')); //pass data to view
    }

    public function AdminPasswordUpdate(Request $request){
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
            return back()->with('$notification');
        }
                //update new password
                User::whereId(Auth::user()->id)->update([
                    'password'=>Hash::make($request->new_password)
                ]);
                $notification=array(
                    'message'=>'password has changed',
                    'alert-type'=>'success'
                 );
                return back()->with('$notification');




    }

}