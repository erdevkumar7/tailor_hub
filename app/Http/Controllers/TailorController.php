<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;


class TailorController extends Controller
{
    //
    public function index(){
        $data['tailors']   = Vendor::where('vendor_type','1')->get();
		return view("front/Tailor/tailorlist",$data);
	}


    public function tailorDetails($id){
        $data['tailor'] = Vendor::where('vendor_id',$id)->first();
		return view("front/Tailor/tailordetails",$data);
	}

    public function ProfileSetting(Request $request)
	{
		$vendorId = Auth::guard('vendor')->user()->vendor_id;
        $data['vendor'] = Vendor::where('vendor_id', $vendorId)->first();
        $data['countries'] = DB::table('master_country')->select('country_id','country_name')->where('country_status',1)->get();
        $data['state']     = DB::table('master_state')->select('state_id','state_name')->where('state_country_id',1)->get();
        $data['city']      = DB::table('master_city')->select('city_id','city_name')->where('city_state_id',1)->get();
		return view("front/tailor/tailor_profile",$data);
	}

	public function profile_update(Request $request)
	{
        $name           = $request->name;
        $email          = $request->email;
        $gender         = $request->gender;
        $img            = $request->img;
        $address        = $request->address;
        $country_id     = $request->country_id;
        $state_id       = $request->state_id;
        $city_id        = $request->city_id;
        $business_name  = $request->business_name;
        $zipcode        = $request->zipcode;


        if($img){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('upload'), $imageName);
        }else{
            $imageName = $request->old_image;
        }

        $vendorId = Auth::guard('vendor')->user()->vendor_id;

        $vendor = Vendor::where('vendor_id', $vendorId)->first();
        $vendor->name                   = $name;
        $vendor->email                  = $email;
        $vendor->profile_img            = $imageName;
        $vendor->address                = $address;
        $vendor->business_name          = $business_name;
        $vendor->country_id             = $country_id;
        $vendor->state_id               = $state_id;
        $vendor->city_id                = $city_id; 
        $vendor->zip_code               = $zipcode;
        $vendor->save();

        Session::flash('message', 'Profile Update Sucessfully!');
        return redirect()->to('/ProfileSetting');

    }


}
