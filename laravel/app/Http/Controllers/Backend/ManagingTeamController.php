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
                if($validateData->fails()) {
                    return response()->json(['errors' => $validateData->errors()], 422);
                }
            return response()->json($notification, 500); // Return error status code
        }
    }//End Method
    public function ManagingTeamView(){
        $managingTeam = ManagingTeams::latest()->get();
        return view('backend.managing-team.view',compact('managingTeam'));
    }//End Method

    public function EditManagingTeam($id){
        $managingTeam = ManagingTeams::findOrFail($id);
        return view('backend.managing-team.edit',compact('managingTeam'));
    }//
    public function UpdateManagingTeam(Request $request,$id){

        if ($request->managing_image) {
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
            ],[
                'name' => 'The Name field is required.',
                'designation' => 'The Designation field is required.',

            ]);
            $imageName = time().'.'.$request->managing_image->extension();
            $request->managing_image->move(public_path('uploads/managing_team/'), $imageName);


            $ManagingTeams=  ManagingTeams::findOrfail($id);

            $path = public_path('uploads/managing_team/'.$ManagingTeams->image);
                if (file_exists($path)) {
                    @unlink($path);
                }
            $ManagingTeams->name = $request->name;
            $ManagingTeams->facebook = $request->facebook;
            $ManagingTeams->instagram = $request->instagram;
            $ManagingTeams->linkedin = $request->linkedin;
            $ManagingTeams->designation = $request->designation;
            $ManagingTeams->twitter = $request->twitter;
            $ManagingTeams->full_discription = $request->full_discription;
            $ManagingTeams->image = $imageName ;
            $ManagingTeams->update();
            $notification = array(
                'message' =>'Managing Team Successfully updated With Image',
                'alert-type'=> 'info'
             );
            return redirect()->route('managing.team.view')->with($notification);
       }else{
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ],[
            'name' => 'The Name field is required.',
            'designation' => 'The Designation field is required.',

        ]);
        $ManagingTeams=  ManagingTeams::findOrfail($id);
        $ManagingTeams->name = $request->name;
        $ManagingTeams->facebook = $request->facebook;
        $ManagingTeams->instagram = $request->instagram;
        $ManagingTeams->linkedin = $request->linkedin;
        $ManagingTeams->designation = $request->designation;
        $ManagingTeams->twitter = $request->twitter;
        $ManagingTeams->full_discription = $request->full_discription;
        $ManagingTeams->update();
        $notification = array(
            'message' =>'Managing Team Successfully updated Without Image',
            'alert-type'=> 'info'
         );
        return redirect()->route('managing.team.view')->with($notification);
       }
    }//End Method
    public function DeleteManagingTeam($id){
        $ManagingTeams=  ManagingTeams::findOrfail($id);
        $path = public_path('uploads/managing_team/'.$ManagingTeams->image);
        if (file_exists($path)) {
            @unlink($path);
        }
        $ManagingTeams->delete();
        $notification = array(
          'message' =>'Managing Team Successfully Deleted',
            'alert-type'=> 'info'
         );
        return redirect()->route('managing.team.view')->with($notification);
    }

}
