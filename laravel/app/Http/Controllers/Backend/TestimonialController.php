<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class TestimonialController extends Controller
{
    public function index(){
        return view('backend.testimonial.insert');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'message' => 'required|max:250',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($request->image){
            $imageName = rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonial/'), $imageName);
            $testimonial = new Testimonial;
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            $testimonial->image = $imageName;
            $testimonial->save();
            return back()->with('message', 'Testimonial Successfully Saved');
        }
        
    }
    public function view()
    {
        $allData = Testimonial::all();
        return view('backend.testimonial.view', compact('allData'));
    }
    public function edit($id)
    {
        $data = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        if($request->image){
            $imageName = rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonial/'), $imageName);
            $testimonial = Testimonial::findOrFail($id);
            unlink(public_path('uploads/testimonial/').$testimonial->image);
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            $testimonial->image = $imageName;
            $testimonial->update();
            return redirect()->route('manage.testimonial')->with('message', 'Testimonial Successfully updated');
        } else {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            $testimonial->update();
            return redirect()->route('manage.testimonial')->with('message', 'Testimonial Successfully updated');
        }
    }
     
     public function delete($id)
     {
        $testimonial = Testimonial::findOrFail($id);
        unlink(public_path('uploads/testimonial/').$testimonial->image);
        $testimonial->delete();
        return back()->with('message', 'Testimonial Successfully Deleted');
     }
     public function status($id)
     {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->status == 0) {
            $newStatus = 1;
        } else {
            $newStatus = 0;
        }
         
        $testimonial->update([
            'status'=>$newStatus
        ]);
        return redirect()->back()->with('message', 'Status Changed Successfully');
     }
}