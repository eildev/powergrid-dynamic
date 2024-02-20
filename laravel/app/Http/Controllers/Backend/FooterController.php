<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function FooterAdd(){
        return view('backend.footer.insert');
    }//End Method
    public function StoreFooter(Request $request){
        FooterSetting::insert([
           'fullAddress' => $request->fullAddress,
           'location' => $request->location,
           'link' => $request->link,
           'phone' => $request->phone,
           'email' => $request->email,
           'website' => $request->website,
           'created_at'=> Carbon::now(),
        ]);
        $notification = array(
            'message' =>'Footer Data Inert Sccessfully',
            'alert-type'=> 'info'
         );
        return redirect()->back()->with($notification);
    }//End Store Function
    public function ViewFooter(){
        $footer = FooterSetting::latest()->get();
        return view('backend.footer.view',compact('footer'));
    }//End Method
}
