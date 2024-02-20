<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeSettingsController extends Controller
{
    public function index(){
        return view('backend.home-page-setting.insert');
    }
}