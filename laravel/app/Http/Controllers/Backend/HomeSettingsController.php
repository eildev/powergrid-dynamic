<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSettings;

class HomeSettingsController extends Controller
{
    public function index()
    {
        return view('backend.home-page-setting.insert');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:250',
            'long_description' => 'required|max:2500',
            'keywords' => 'required|max:250',
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
            return back()->with('message', 'HomeSettings Successfully Saved');
        }
    }
    public function view()
    {
        $allData = HomeSettings::all();
        return view('backend.home-page-setting.view', compact('allData'));
    }
    public function edit($id)
    {
        $homeData = HomeSettings::findOrFail($id);
        return view('backend.home-page-setting.edit', compact('homeData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'short_description' => 'required|max:250',
            'long_description' => 'required|max:2500',
            'keywords' => 'required|max:250',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'fav' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $homeData = HomeSettings::findOrFail($id);

        if ($request->hasFile('logo') && $request->hasFile('fav')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'fav' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $logoImage = rand() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/home-settings/'), $logoImage);

            $favIcons = rand() . '.' . $request->file('fav')->extension();
            $request->file('fav')->move(public_path('uploads/home-settings/'), $favIcons);

            // Remove existing images
            $logoPath = public_path('uploads/home-settings/' . $homeData->logo);
            $favPath = public_path('uploads/home-settings/' . $homeData->fav);

            if (file_exists($logoPath)) {
                @unlink($logoPath);
            }

            if (file_exists($favPath)) {
                @unlink($favPath);
            }

            $homeData->logo = $logoImage;
            $homeData->fav = $favIcons;
        } elseif ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $logoImage = rand() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/home-settings/'), $logoImage);

            // Remove existing logo image
            $logoPath = public_path('uploads/home-settings/' . $homeData->logo);
            if (file_exists($logoPath)) {
                @unlink($logoPath);
            }

            $homeData->logo = $logoImage;
        } elseif ($request->hasFile('fav')) {
            $request->validate([
                'fav' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $favIcons = rand() . '.' . $request->file('fav')->extension();
            $request->file('fav')->move(public_path('uploads/home-settings/'), $favIcons);

            // Remove existing fav image
            $favPath = public_path('uploads/home-settings/' . $homeData->fav);
            if (file_exists($favPath)) {
                @unlink($favPath);
            }

            $homeData->fav = $favIcons;
        }

        $homeData->title = $request->title;
        $homeData->short_description = $request->short_description;
        $homeData->long_description = $request->long_description;
        $homeData->keywords = $request->keywords;
        $homeData->update();

        return redirect()->route('manage.home.settings')->with('message', 'Home Settings Successfully updated');
    }


    public function delete($id)
    {
        $homeData = HomeSettings::findOrFail($id);
        unlink(public_path('uploads/home-settings/') . $homeData->logo);
        unlink(public_path('uploads/home-settings/') . $homeData->fav);
        $homeData->delete();
        return back()->with('message', 'home settings Successfully deleted');
    }
}
