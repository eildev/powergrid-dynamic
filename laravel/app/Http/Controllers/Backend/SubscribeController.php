<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        dd($request);

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:your_table_name_here|max:250',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => 400,
                    "message" => $validator->errors()->first(),
                ], 400);
            }

            Subscribe::insert([
                'email' => $request->email,
                'created_at' => Carbon::now()
            ]);
            return response()->json([
                "status" => 200,
                "message" => "subscribe save Successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
