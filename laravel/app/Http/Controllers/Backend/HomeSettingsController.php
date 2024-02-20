<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSettings;

class HomeSettingsController extends Controller
{
    public function index(){
        return view('backend.home-page-setting.insert');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fav' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->logo && $request->fav) {
            $logoName = rand() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/home-settings/'), $logoName);
            $favName = rand() . '.' . $request->fav->extension();
            $request->fav->move(public_path('uploads/home-settings/'), $favName);
            $homeSettings = new HomeSettings;
            $homeSettings->title = $request->title;
            $homeSettings->logo = $logoName;
            $homeSettings->fav = $favName;
            $homeSettings->short_description = $request->short_description;
            $homeSettings->long_description = $request->long_description;
            $homeSettings->keywords = $request->keywords;
            $homeSettings->save();
            return back()->with('success', 'HomeSettings Successfully Saved');
        }
    }
    public function view(){
        $allData = HomeSettings::all();
        return view('backend.home-page-setting.view', compact('allData'));
    }
}