<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialIcon;

class SocialIconController extends Controller
{
    public function index(){
        return view('backend.social.insert');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'link' => 'required|max:250'
        ]);
        $social = new SocialIcon;
        $social->name = $request->name;
        $social->link = $request->link;
        $social->save();
        return back()->with('success', 'social icon Successfully Saved');
    }
    public function view()
    {
        $allData = SocialIcon::all();
        return view('backend.social.view', compact('allData'));
    }
    public function edit($id)
    {
        $data = SocialIcon::findOrFail($id);
        return view('backend.social.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        $social = SocialIcon::findOrFail($id);
        $social->name = $request->name;
        $social->link = $request->link;
        $social->update();
        return redirect()->route('manage.social.icon')->with('success', 'social icon Successfully updated');
    }
     
     public function delete($id)
     {
        $social = SocialIcon::findOrFail($id);
        $social->delete();
        return back()->with('success', 'Social icon Successfully deleted');
     }
     public function status($id)
     {
        $social = SocialIcon::findOrFail($id);
        if ($social->status == 0) {
            $newStatus = 1;
        } else {
            $newStatus = 0;
        }
         
        $social->update([
            'status'=>$newStatus
        ]);
        return redirect()->back()->with('message', 'status changed successfully');
     }
}