<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurServices;
use App\Models\ServicesDetails;
use Carbon\Carbon;
class ServicesController extends Controller
{
    public function ServicesAdd(){
        return view('backend.our_services.insert');
    }//End Method
    public function StoreServices(Request $request){
        $request->validate([
            'services_title' => 'required',
            'services_sub_title' => 'required',
            'service_description' => 'required',
        ]);
        OurServices::insert([
          'services_title' => $request->services_title,
          'services_sub_title' => $request->services_sub_title,
          'service_description' => $request->service_description,
          'created_at'=> Carbon::now(),
        ]);
        $notification = array(
            'message' =>'Our Service Insert Sccessfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('service.view')->with($notification);
    }//End Method
    public function ViewServices(){
        $services = OurServices::latest()->get();
        return view('backend.our_services.view',compact('services'));
    }//End Method
    public function EditServices($id){
        $services = OurServices::findOrFail($id);
        return view('backend.our_services.edit',compact('services'));
    }//End Method
    public function UpdateServices(Request $request,$id){
        OurServices::findOrFail($id)->update([
            'services_title' => $request->services_title,
            'services_sub_title' => $request->services_sub_title,
            'service_description' => $request->service_description,
            'updated_at'=> Carbon::now(),
          ]);
          $notification = array(
              'message' =>'Our Service Updated Sccessfully',
              'alert-type'=> 'info'
           );
          return redirect()->route('service.view')->with($notification);
    }//End Method
    public function DeleteServices($id){
        OurServices::findOrFail($id)->delete();
        $notification = array(
           'message' =>'Our Service Deleted Sccessfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('service.view')->with($notification);
    }

    ///Service Details Controller
    public function ServicesDetailsAdd(){
        $services = OurServices::latest()->get();
        return view('backend.our_services.services_details.insert',compact('services'));
    }//End Method
    public function StoreServicesDetails(Request $request){
        $request->validate([
            'services_details_title' => 'required',
            'services_title' => 'required',
            'services_details_description' => 'required',
            'services_details_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'services_details_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->services_details_icon && $request->services_details_image) {
            $iconName = rand() . '.' . $request->services_details_icon->extension();
            $request->services_details_icon->move(public_path('uploads/services_image/'), $iconName);
            $imageName = rand() . '.' . $request->services_details_image->extension();
            $request->services_details_image->move(public_path('uploads/services_image/'), $imageName);
            $servicesDetails = new ServicesDetails;
            $servicesDetails->services_details_title = $request->services_details_title;
            $servicesDetails->services_details_icon = $iconName;
            $servicesDetails->services_details_image = $imageName;
            $servicesDetails->services_id =  $request->services_title;
            $servicesDetails->services_details_description = $request->services_details_description;
            $servicesDetails->save();
            $notification = array(
                'message' =>'Our Service Details Insert Sccessfully',
                 'alert-type'=> 'info'
              );
             return redirect()->route('service.details.view')->with($notification);
        }

    }//End Method
    public function ViewServicesDetails(){
        $servicesDetails = ServicesDetails::latest()->get();
        return view('backend.our_services.services_details.view',compact('servicesDetails'));
    }//End Method
    public function EditServicesDetails($id){
        $services = OurServices::latest()->get();
        $servicesDetails = ServicesDetails::findOrFail($id);
        return view('backend.our_services.services_details.edit',compact('servicesDetails','services'));
    }//End Method
    public function UpdateServicesDetails(Request $request,$id){
         if($request->services_details_image && $request->services_details_icon) {
            $request->validate([
                'services_details_title' => 'required',
                'services_title' => 'required',
                'services_details_description' => 'required',
            ]);
           $iconName = rand() . '.' . $request->services_details_icon->extension();
           $request->services_details_icon->move(public_path('uploads/services_image/'), $iconName);
            $imageName = rand() . '.' . $request->services_details_image->extension();
            $request->services_details_image->move(public_path('uploads/services_image/'), $imageName);
            $servicesDetails = ServicesDetails::findOrFail($id);
          $path1 =public_path('uploads/services_image/'. $servicesDetails->services_details_icon);
           $path2 =public_path('uploads/services_image/'. $servicesDetails->services_details_image);
                if(file_exists($path1)){
                    @unlink($path1);
                }
                if(file_exists($path2)){
                    @unlink($path2);
                }
            $servicesDetails->services_details_title = $request->services_details_title;
           $servicesDetails->services_details_icon = $iconName;
            $servicesDetails->services_details_image = $imageName;
            $servicesDetails->services_id =  $request->services_title;
            $servicesDetails->services_details_description = $request->services_details_description;
            $servicesDetails->update();

           $notification = array(
                'message' =>'Our Service Details Update With Both image  Sccessfully',
                 'alert-type'=> 'info'
              );
             return redirect()->route('service.details.view')->with($notification);
        }

        elseif($request->services_details_icon) {
            $request->validate([
                'services_details_title' => 'required',
                'services_title' => 'required',
                'services_details_description' => 'required',
            ]);
            $iconName = rand() . '.' . $request->services_details_icon->extension();
            $request->services_details_icon->move(public_path('uploads/services_image/'), $iconName);
            // $imageName = rand() . '.' . $request->services_details_image->extension();
            // $request->services_details_image->move(public_path('uploads/services_image/'), $imageName);
            $servicesDetails = ServicesDetails::findOrFail($id);
           $path1 =public_path('uploads/services_image/'. $servicesDetails->services_details_icon);
          // $path2 =public_path('uploads/services_image/'. $servicesDetails->services_details_image);
                if(file_exists($path1)){
                    @unlink($path1);
                }
                // elseif(file_exists($path2)){
                //     @unlink($path2);
                // }
            $servicesDetails->services_details_title = $request->services_details_title;
            $servicesDetails->services_details_icon = $iconName;
        //    $servicesDetails->services_details_image = $imageName;
            $servicesDetails->services_id =  $request->services_title;
            $servicesDetails->services_details_description = $request->services_details_description;
            $servicesDetails->update();

           $notification = array(
                'message' =>'Our Service Details Update With image  Sccessfully',
                 'alert-type'=> 'info'
              );
             return redirect()->route('service.details.view')->with($notification);
        }
        elseif($request->services_details_image) {
            $request->validate([
                'services_details_title' => 'required',
                'services_title' => 'required',
                'services_details_description' => 'required',
            ]);
           // $iconName = rand() . '.' . $request->services_details_icon->extension();
          //  $request->services_details_icon->move(public_path('uploads/services_image/'), $iconName);
            $imageName = rand() . '.' . $request->services_details_image->extension();
            $request->services_details_image->move(public_path('uploads/services_image/'), $imageName);
            $servicesDetails = ServicesDetails::findOrFail($id);
         //  $path1 =public_path('uploads/services_image/'. $servicesDetails->services_details_icon);
           $path2 =public_path('uploads/services_image/'. $servicesDetails->services_details_image);
                // if(file_exists($path1)){
                //     @unlink($path1);
                // }
                if(file_exists($path2)){
                    @unlink($path2);
                }
            $servicesDetails->services_details_title = $request->services_details_title;
          //  $servicesDetails->services_details_icon = $iconName;
            $servicesDetails->services_details_image = $imageName;
            $servicesDetails->services_id =  $request->services_title;
            $servicesDetails->services_details_description = $request->services_details_description;
            $servicesDetails->update();

           $notification = array(
                'message' =>'Our Service Details Update With image  Sccessfully',
                 'alert-type'=> 'info'
              );
             return redirect()->route('service.details.view')->with($notification);
        }
        else{
            $request->validate([
                'services_details_title' => 'required',
                'services_title' => 'required',
                'services_details_description' => 'required',
            ]);
            $servicesDetails = ServicesDetails::findOrFail($id);
            $servicesDetails->services_details_title = $request->services_details_title;
            $servicesDetails->services_id =  $request->services_title;
            $servicesDetails->services_details_description = $request->services_details_description;
            $servicesDetails->update();
            $notification = array(
                'message' =>'Our Service Details Update Without image Sccessfully',
                 'alert-type'=> 'info'
              );
             return redirect()->route('service.details.view')->with($notification);
        }
    }//End Method
    public function DeleteServicesDetails($id){
        $servicesDetails =  ServicesDetails::findOrFail($id);
        $path1 =public_path('uploads/services_image/'. $servicesDetails->services_details_icon);
        $path2 =public_path('uploads/services_image/'. $servicesDetails->services_details_image);
             if(file_exists($path1)){
                 @unlink($path1);
             }
             elseif(file_exists($path2)){
                 @unlink($path2);
             }
        $servicesDetails->delete();
        $notification = array(
         'message' =>'Our Service Details Deleted Sccessfully',
            'alert-type'=> 'info'
         );
        return redirect()->route('service.details.view')->with($notification);

    }

}
