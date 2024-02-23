<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function GalleryAdd(){
        $category  = Category::latest()->get();
        return view('backend.gallery.insert',compact('category'));
    }//End MEthod
    public function StoreGallery(Request $request){
        if ($request->gallery_image) {
            $imageName = rand().'.'.$request->gallery_image->extension();
            $request->gallery_image->move(public_path('uploads/gallery/'), $imageName);
            $gallery = new Gallery;
            $gallery->category_id = $request->category_name;
            $gallery->title = $request->gallery_title;
            $gallery->gallery_image = $imageName;
            $gallery->save();
            return response()->json([
                'message' => 'Gallery Inserted Successfully',
                'status' => 'success',
            ]);
            return response()->json([
                'message' => 'Failed to insert gallery',
                'status' => 'error',
            ], 500);

    return redirect()->route('gallery.view');
    }
}//End Method
    public function ViewGallery(){
        $gallery = Gallery::latest()->get();
        return view('backend.gallery.view',compact('gallery'));
    }//End Method
    public function EditGallery($id){
        $category  = Category::latest()->get();
        $gallery = Gallery::findOrFail($id);
        return view('backend.gallery.edit',compact('gallery','category'));
    }//End Method
    public function UpdateGallery(Request $request,$id){
        if ($request->gallery_image) {
            $request->validate([
                'category_name' =>'required',
                'gallery_title' =>'required',

            ]);
            $imageName = rand().'.'.$request->gallery_image->extension();
            $request->gallery_image->move(public_path('uploads/gallery/'), $imageName);
            $gallery = Gallery::findOrFail($id);
            $path =public_path('uploads/gallery/'.$gallery->gallery_image);
            if(file_exists($path)){
                @unlink($path);
            }
            $gallery->category_id = $request->category_name;
            $gallery->title = $request->gallery_title;
            $gallery->gallery_image = $imageName;

            $gallery->update();
            $notification = array(
                'message' =>'Gallery Successfully updated With Image',
                'alert-type'=> 'info'
             );
            return redirect()->route('gallery.view')->with($notification);
        } else {
            $request->validate([
                'category_name' =>'required',
                'gallery_title' =>'required',
            ]);
            $gallery = Gallery::findOrFail($id);
            $gallery->category_id = $request->category_name;
            $gallery->title = $request->gallery_title;
            $gallery->update();
            $notification = array(
                'message' =>'Gallery Successfully updated Without Image',
                'alert-type'=> 'info'
             );
            return redirect()->route('gallery.view')->with($notification);
        }
    }//End Method
    public function DeleteGallery($id){
        $gallery = Gallery::findOrFail($id);
        $path =public_path('uploads/gallery/'.$gallery->gallery_image);
                if(file_exists($path)){
                    @unlink($path);
                }
        $gallery->delete();
        $notification = array(
           'message' =>'Gallery Deleted Sccessfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('gallery.view')->with($notification);
    }//End Menthod


}
