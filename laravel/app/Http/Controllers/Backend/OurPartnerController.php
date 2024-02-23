<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurPartner;
use App\Models\OurPartnerDetails;

class OurPartnerController extends Controller
{
    public function index()
    {
        return view('backend.our-partner.insert');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:100',
            'subtitle' => 'required|max:250',
            'description' => 'required|max:5000'
        ]);
        $partner = new OurPartner;
        $partner->title = $request->title;
        $partner->subtitle = $request->subtitle;
        $partner->description = $request->description;
        $partner->save();
        if ($request->logo) {
            $logoName = rand() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/partner/'), $logoName);
            $details = new OurPartnerDetails;
            $details->partner_id = $partner->id;
            $details->title = $request->details_title;
            $details->description = $request->details_description;
            $details->link = $request->link;
            $details->logo = $logoName;
            $details->save();
        }
        return back()->with('message', 'Partner Successfully Saved');
    }
    public function view()
    {
        $allData = OurPartner::all();
        return view('backend.our-partner.view', compact('allData'));
    }
    public function edit($id)
    {
        $data = OurPartner::findOrFail($id);
        return view('backend.our-partner.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        if ($request->logo) {
            $partner = OurPartner::findOrFail($id);
            $partner->title = $request->title;
            $partner->subtitle = $request->subtitle;
            $partner->description = $request->description;
            $partner->update();

            $logoName = rand() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/partner/'), $logoName);
            $details = OurPartnerDetails::where('partner_id', $id)->latest()->first();
            unlink(public_path('uploads/partner/') . $details->logo);
            $details->partner_id = $partner->id;
            $details->title = $request->details_title;
            $details->description = $request->details_description;
            $details->link = $request->link;
            $details->logo = $logoName;
            $details->update();
        } else {
            $partner = OurPartner::findOrFail($id);
            $partner->title = $request->title;
            $partner->subtitle = $request->subtitle;
            $partner->description = $request->description;
            $partner->update();

            $details = OurPartnerDetails::where('partner_id', $id)->latest()->first();
            $details->partner_id = $partner->id;
            $details->title = $request->details_title;
            $details->description = $request->details_description;
            $details->link = $request->link;
            $details->update();
        }
        return redirect()->route('manage.our-partner')->with('success', 'Partner Successfully Updated');
    }

    public function delete($id)
    {
        $partner = OurPartner::findOrFail($id);
        $details = OurPartnerDetails::where('partner_id', $id)->latest()->first();
        unlink(public_path('uploads/partner/') . $details->logo);
        $partner->delete();
        return back()->with('message', 'Partner Successfully deleted');
    }
    public function status($id)
    {
        $partner = OurPartner::findOrFail($id);
        if ($partner->status == 0) {
            $newStatus = 1;
        } else {
            $newStatus = 0;
        }

        $partner->update([
            'status' => $newStatus
        ]);
        return redirect()->back()->with('message', 'Why Choose Us changed successfully');
    }
}
