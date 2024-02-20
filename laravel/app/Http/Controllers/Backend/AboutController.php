<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSettings;
class AboutController extends Controller
{
    public function AboutAdd(){
        return view('backend.about.insert');
    }//End Method

    public function StoreAbout(Request $request){
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'about_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($request->about_image) {
            $imageName = rand().'.'.$request->about_image->extension();
            $request->about_image->move(public_path('uploads/about/'), $imageName);
            $about = new AboutSettings;
            $about->title = $request->title;
            $about->description = $request->description;
            $about->image = $imageName;
            $about->save();
            $notification = array(
                'message' =>'About Sccessfully Inserted',
                'alert-type'=> 'info'
             );
            return redirect()->route('about.view')->with($notification);

    }//End Method
}
        public function ViewAbout(){
            $about = AboutSettings::latest()->get();
            return view('backend.about.view',compact('about'));
        }//End Method
        public function EditAbout($id){
            $about = AboutSettings::findOrFail($id);
            return view('backend.about.edit',compact('about'));
        }//End Method
        public function UpdateAbout(Request $request,$id){

            if ($request->about_image) {
                $request->validate([
                    'title' => 'required|max:200',
                    'description' => 'required',

                ]);
                $imageName = rand() . '.' . $request->about_image->extension();
                $request->about_image->move(public_path('uploads/about/'), $imageName);
                $about = AboutSettings::findOrFail($id);
                $path =public_path('uploads/about/'.$about->image);
                if(file_exists($path)){
                    @unlink($path);
                }
                $about->title = $request->title;
                $about->description = $request->description;
                $about->image = $imageName;
                $about->update();
                $notification = array(
                    'message' =>'About Successfully updated With Image',
                    'alert-type'=> 'info'
                 );
                return redirect()->route('about.view')->with($notification);
            } else {
                $request->validate([
                    'title' => 'required|max:200',
                    'description' => 'required',
                ]);
                $about = AboutSettings::findOrFail($id);
                $about->title = $request->title;
                $about->description = $request->description;
                $about->update();
                $notification = array(
                    'message' =>'About Successfully updated Without Image',
                    'alert-type'=> 'info'
                 );
                return redirect()->route('about.view')->with($notification);
            }
      }//End Method
      public function DeleteAbout($id){
        $about = AboutSettings::findOrFail($id);
        $path =public_path('uploads/about/'.$about->image);
                if(file_exists($path)){
                    @unlink($path);
                }
         AboutSettings::findOrFail($id)->delete();
         $notification = array(
            'message' =>'About Successfully Deleted',
            'alert-type'=> 'info'
         );
        return redirect()->route('about.view')->with($notification);
      }
}
