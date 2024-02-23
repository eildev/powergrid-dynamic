<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsDetails;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        return view('backend.why-choose-us.insert');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:100',
            'sub_title' => 'required|max:250',
            'description' => 'required|max:5000'
        ]);
        $why_chose_us = new WhyChooseUs;
        $why_chose_us->title = $request->title;
        $why_chose_us->sub_title = $request->sub_title;
        $why_chose_us->description = $request->description;
        $why_chose_us->save();
        if ($request->icon) {
            $iconName = rand() . '.' . $request->icon->extension();
            $request->icon->move(public_path('uploads/why-choose-us/'), $iconName);
            $details = new WhyChooseUsDetails;
            $details->why_id = $why_chose_us->id;
            $details->title = $request->details_title;
            $details->description = $request->details_description;
            $details->icon = $iconName;
            $details->save();
        }
        return back()->with('message', 'Why Choose Us Successfully Saved');
    }
    public function view()
    {
        $allData = WhyChooseUs::all();
        return view('backend.why-choose-us.view', compact('allData'));
    }
    public function edit($id)
    {
        $data = WhyChooseUs::findOrFail($id);
        return view('backend.why-choose-us.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $why_chose_us = WhyChooseUs::findOrFail($id);
        $why_chose_us->title = $request->title;
        $why_chose_us->sub_title = $request->sub_title;
        $why_chose_us->description = $request->description;
        $why_chose_us->update();
        if ($request->icon) {
            $iconName = rand() . '.' . $request->icon->extension();
            $request->icon->move(public_path('uploads/why-choose-us/'), $iconName);
            $details = WhyChooseUsDetails::where('why_id', $id)->latest()->first();
            unlink(public_path('uploads/why-choose-us/') . $details->icon);
            $details->why_id = $why_chose_us->id;
            $details->title = $request->details_title;
            $details->description = $request->details_description;
            $details->icon = $iconName;
            $details->update();
        } else {
            $details = new WhyChooseUsDetails;
            $details->why_id = $why_chose_us->id;
            $details->title = $request->details_title;
            $details->description = $request->details_description;
            $details->update();
        }
        return redirect()->route('manage.why-choose-us')->with('success', 'Why Choose Us Successfully Updated');
    }

    public function delete($id)
    {
        $why_chose_us = WhyChooseUs::findOrFail($id);
        $details = WhyChooseUsDetails::where('why_id', $id)->latest()->first();
        unlink(public_path('uploads/why-choose-us/') . $details->icon);
        $why_chose_us->delete();
        return back()->with('message', 'Why Choose Us icon Successfully deleted');
    }
    public function status($id)
    {
        $why_chose_us = WhyChooseUs::findOrFail($id);
        if ($why_chose_us->status == 0) {
            $newStatus = 1;
        } else {
            $newStatus = 0;
        }

        $why_chose_us->update([
            'status' => $newStatus
        ]);
        return redirect()->back()->with('message', 'Why Choose Us changed successfully');
    }
}
