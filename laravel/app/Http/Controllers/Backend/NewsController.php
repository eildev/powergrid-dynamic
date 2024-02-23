<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        return view('backend.news.insert');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($request->image){
            $imageName = rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/news/'), $imageName);
            $news = new News;
            $news->title = $request->title;
            $news->description = $request->description;
            $news->image = $imageName;
            $news->save();
            return back()->with('message', 'News Successfully Saved');
        }
        
    }
    public function view()
    {
        $allData = News::all();
        return view('backend.news.view', compact('allData'));
    }
    public function edit($id)
    {
        $data = News::findOrFail($id);
        return view('backend.news.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        if($request->image){
            $imageName = rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/news/'), $imageName);
            $news = News::findOrFail($id);
            unlink(public_path('uploads/news/').$news->image);
            $news->title = $request->title;
            $news->description = $request->description;
            $news->image = $imageName;
            $news->update();
            return redirect()->route('manage.news')->with('message', 'News Successfully updated');
        } else {
            $news = News::findOrFail($id);
            $news->title = $request->title;
            $news->description = $request->description;
            $news->update();
            return redirect()->route('manage.news')->with('message', 'News Successfully updated');
        }
    }
     
     public function delete($id)
     {
        $news = News::findOrFail($id);
        unlink(public_path('uploads/news/').$news->image);
        $news->delete();
        return back()->with('message', 'News Successfully Deleted');
     }
     public function status($id)
     {
        $news = News::findOrFail($id);
        if ($news->status == 0) {
            $newStatus = 1;
        } else {
            $newStatus = 0;
        }
         
        $news->update([
            'status'=>$newStatus
        ]);
        return redirect()->back()->with('message', 'Status Changed Successfully');
     }
}