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
       $request->validate([
        'name' => 'required',
        'designation' => 'required',
        'managing_image' => 'required|image|mimes:jpeg,png,jpg,gif',
       ]);
        if($request->managing_image) {
            $imageName = rand().'.'.$request->managing_image->extension();
            $request->managing_image->move(public_path('uploads/managing_team/'),$imageName);
          ManagingTeams::insert([
            'name' => $request->name,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'designation' => $request->designation,
            'twitter' => $request->twitter,
            'full_discription' => $request->full_discription,
            'image' => $imageName,
            'created_at' => Carbon::now(),
        ]);
            $notification = array(
                'message' =>'Managing Team Sccessfully Inserted',
                'alert-type'=> 'info'
             );
            return redirect()->back()->with($notification);

    }
    }//End Method
}
