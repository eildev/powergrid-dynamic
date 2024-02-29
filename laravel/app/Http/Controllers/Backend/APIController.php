<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutSettings;
use App\Models\Category;
use App\Models\FooterSetting;
use App\Models\Gallery;
use App\Models\HomeSettings;
use App\Models\ManagingTeams;
use App\Models\News;
use App\Models\OurPartnerDetails;
use App\Models\Overview;
use App\Models\ServicesDetails;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsDetails;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getAllFooterData()
    {
        try {
            $footers = FooterSetting::latest()->get();
            return response()->json([
                "status" => 200,
                "footers" => $footers
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function getAllAboutData()
    {
        try {
            $allData = AboutSettings::latest()->get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getCategoryData()
    {
        try {
            $allData = Category::latest()->get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getHomeData()
    {
        try {
            $allData = HomeSettings::latest()->get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getOverview()
    {
        try {
            $overviews = Overview::latest()->get();
            return response()->json([
                "status" => 200,
                "allData" => $overviews
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getWhyChooseUs()
    {
        try {
            $whyChooseUs = WhyChooseUs::where('status', 1)->latest()->first();
            return response()->json([
                "status" => 200,
                "allData" => $whyChooseUs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getWhyChooseUsDetails()
    {
        try {
            $whyChooseUsDetails = WhyChooseUsDetails::get();
            return response()->json([
                "status" => 200,
                "allData" => $whyChooseUsDetails
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getServicesDetails()
    {
        try {
            $allData = ServicesDetails::get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getPartnersDetails()
    {
        try {
            $allData = OurPartnerDetails::get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getManagementTeam()
    {
        try {
            $allData = ManagingTeams::get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getGallery()
    {
        try {
            $allData = Gallery::get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getNews()
    {
        try {
            $allData = News::get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while saving the logo name.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function getTestimonial()
    {
        try {
            $allData = Testimonial::get();
            return response()->json([
                "status" => 200,
                "allData" => $allData
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
