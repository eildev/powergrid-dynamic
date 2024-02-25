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
        $validateData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'managing_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ],[
            'name' => 'The Name field is required.',
            'designation' => 'The Designation field is required.',
            'managing_image.image' => 'The Managing image must be an image file.',
            'managing_image.mimes' => 'The Managing image must be a file of type: jpeg, png, jpg, gif.',
        ]);
       
        if ($request->hasFile('managing_image')) {
            $imageName = time().'.'.$request->managing_image->extension();
            $request->managing_image->move(public_path('uploads/managing_team/'), $imageName);
          $managingTeam = ManagingTeams::insert([
            'name' => $validateData['name'],
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'designation' => $validateData['designation'],
            'twitter' => $request->twitter,
            'full_discription' => $request->full_discription,
            'image' => $imageName ?? null, // Set image name only if file was uploaded
        ]);
    }
        if ($managingTeam) {
            $notification = [
                'message' => 'Managing Team Successfully Inserted',
                'alert-type' => 'info'
            ];
            return response()->json($notification);
        } else {
                if($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }
            return response()->json($notification, 500); // Return error status code
        }
    }
}
