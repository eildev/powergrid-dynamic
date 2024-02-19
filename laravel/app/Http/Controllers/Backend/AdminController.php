<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //Admin Dashboard
    public function AdminDashboard(){
        return view('backend.admin_dashboard');
    }//End Method
    public function AdminLogin(){
        return view('backend.admin_login');
    }//End Method
    public function AdminForgotPassword(){
        return view('backend.admin_forgot_password');
    }//End Method

    //Admin Logout
    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' =>'Admin Sccessfully Logout',
            'alert-type'=> 'info'
         );
        return redirect('/admin/login')->with($notification);
    }//End Method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('backend.admin_profile.admin_profile',compact('adminData'));
    }//End Method
    public function AdminProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.admin_profile.profile_edit',compact('editData'));
    }//End Method
    public function AdminStoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('admin_image/profile/'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();
        return redirect()->route('admin.profile');
    }//End MEthod
    public function AdminChangePassword(){
        return view('backend.admin_profile.change_password');
    }//End Method
    public function AdminUpdatePassword(request $request){
        $validateData = $request->validate([
            'Old_Password' => 'required',
            'New_Password'=> 'required',
            'Confirm_Password' => 'required|same:New_Password',

        ]);
        $hashpassword = Auth::user()->password;
        if(Hash::check($request->Old_Password,$hashpassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->New_Password);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        }
        else{
            session()->flash('message','Old Password is Not Matched');
            return redirect()->back();
        }
    }

}
