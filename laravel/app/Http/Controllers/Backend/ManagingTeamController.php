<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManagingTeams;
use Carbon\Carbon;

class ManagingTeamController extends Controller
{
    public function ManagingTeamAdd(){
        return view('backend.managing-team.insert');
    }//
    public function StoreManagingTeam(Request $request){
       // dd($request->all());

        if($request->image) {
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            $imageName = rand().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/managinging_team/'), $imageName);
            $manageingTeam = new ManagingTeams;
            $manageingTeam->name = $request->name;
            $manageingTeam->designation = $request->designation;
            $manageingTeam->facebook = $request->facebook;
            $manageingTeam->instagram = $request->instagram;
            $manageingTeam->linkedin = $request->linkedin;
            $manageingTeam->twitter = $request->twitter;
            $manageingTeam->full_discription = $request->full_discription;
            $manageingTeam->image = $imageName;
            $manageingTeam->created_at =Carbon::now();
            $manageingTeam->save();
            $notification = array(
                'message' =>'Managing Team Sccessfully Inserted',
                'alert-type'=> 'info'
             );
            return redirect()->back()->with($notification);

    }//End Method
    }
}
