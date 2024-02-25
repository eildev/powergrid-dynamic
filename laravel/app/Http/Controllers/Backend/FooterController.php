<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function FooterAdd()
    {
        return view('backend.footer.insert');
    } //End Method
    public function StoreFooter(Request $request)
    {
        FooterSetting::insert([
            'fullAddress' => $request->fullAddress,
            'location' => $request->location,
            'link' => $request->link,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Footer Data Insert Sccessfully',
            'alert-type' => 'info'
        );
        return redirect()->route('view.footer')->with($notification);
    } //End Store Function
    public function ViewFooter()
    {
        $footer = FooterSetting::latest()->get();
        return view('backend.footer.view', compact('footer'));
    } //End Method
    public function EditFooter($id)
    {
        $footer = FooterSetting::findOrFail($id);
        return view('backend.footer.edit', compact('footer'));
    } //End Method

    public function UpdateFooter(Request $request, $id)
    {
        FooterSetting::findOrFail($id)->update([
            'fullAddress' => $request->fullAddress,
            'location' => $request->location,
            'link' => $request->link,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Footer Data Update Sccessfully',
            'alert-type' => 'info'
        );
        return redirect()->route('view.footer')->with($notification);
    } //End Store Function
    public function DeleteFooter($id)
    {
        FooterSetting::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Footer Deleted Sccessfully',
            'alert-type' => 'info'
        );
        return redirect()->route('view.footer')->with($notification);
    }


    public function getAllFooterData()
    {
        $footers = FooterSetting::latest()->get();
        return response()->json([
            "status" => 200,
            "footers" => $footers
        ]);
    }
}
