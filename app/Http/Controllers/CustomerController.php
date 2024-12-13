<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class CustomerController extends Controller
{
    
    public function ProfileSetting(){
        $data['customer'] = User::where('id', auth('user')->id())->first();
        return view("front/user/profilesetting",$data);
    }


    public function profile_update(Request $request)
	{
        $first_name     = $request->first_name;
        $last_name      = $request->last_name;
        $email          = $request->email;
        $gender         = $request->gender;
        $img            = $request->img;
        $address        = $request->address;

        if($img){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('upload'), $imageName);
        }else{
            $imageName = $request->old_image;
        }




        $customer = User::where('id', auth('user')->id())->first();
        $customer->first_name             = $request->first_name;
        $customer->last_name              = $request->last_name;
        $customer->email_id               = $request->email;
        $customer->gender                 = $request->gender;
        $customer->profile_image          = $imageName;
        $customer->address                = $address;
        $customer->save();

        Session::flash('message', 'Profile Update Sucessfully!');
        return redirect()->to('/ProfileSetting');

    }

    public function customerDashboard()
    {
        //This function is for customer dashboard
        if (Auth::guard('user')->check()) {
			// Redirect to the user dashboard if authenticated
			return view('front.user.customer_dash');
		}
		else{
			return redirect()->to('/login');
		}
    }

    public function updateProfile(Request $request)
    {
        //This function is for update the customer profile
        $customer = User::where('id', auth('user')->id())->first();
        $imageName=$customer->profile_image;
        if ($request->isMethod('post')) {

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = "cus".time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/admin/uploads/user'), $imageName);
            }

            DB::table('users')
                  ->where('id', auth('user')->id())
                  ->update([
                  'first_name' => trim($request->first_name),
                  'last_name' => trim($request->last_name),
                  'profile_image' => $imageName,
                  'gender' => $request->gender,
                  'address' => $request->address,
                  'country_id'=>$request->country_id,
                  'city_id' => $request->city_id,
                  'state_id' => $request->state_id,
                  'zipcode' => $request->zipcode,
              ]);

              Session::flash('message', 'Your Profile Updated Sucessfully!');
              return redirect()->to('/customerProfile');
        }
        

        $countries = DB::table('master_country')->select('country_id','country_name')->where('country_status',1)->get();
        $state = DB::table('master_state')->select('state_id','state_name')->where('state_country_id',$customer->country_id)->get();
        $city = DB::table('master_city')->select('city_id','city_name')->where('city_state_id',$customer->state_id)->get();

        
        
        return view('front.user.customer_profile',compact('customer','countries','state','city'));
    }
    public function addShipping(Request $request, $id = null)
    {
        $address=$state=$city='';
        $countries = DB::table('master_country')->select('country_id','country_name')->where('country_status',1)->get();
        if($id)
		{
            $address = Shipping::where('id', $id)->first();
            $state = DB::table('master_state')->select('state_id','state_name')->where('state_country_id',$address->country_id)->get();
            $city = DB::table('master_city')->select('city_id','city_name')->where('city_state_id',$address->state_id)->get();
        }
        
        
        if ($request->isMethod('post')) {
            if($request->address_id){
                    DB::table('shipping_address')
                    ->where('id', $request->address_id)
                    ->update([
                    'address_name' => trim($request->address_name),
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'address_line_1' => $request->address_line_1,
                    'address_line_2'=>$request->address_line_2,
                    'landmark' => $request->landmark,
                    'postal_code' => $request->postal_code,
                    
                ]);

                Session::flash('message', 'Your Address Updated Sucessfully!');
            }
            else{
                $shipping = new Shipping;
                $shipping->customer_id = auth('user')->id();
                $shipping->address_name = $request->address_name;
                $shipping->country_id = $request->country_id;
                $shipping->state_id = $request->state_id;
                $shipping->city_id = $request->city_id;
                $shipping->address_line_1 = $request->address_line_1;
                $shipping->address_line_2 = $request->address_line_2;
                $shipping->landmark = $request->landmark;
                $shipping->postal_code = $request->postal_code;
                $shipping->is_primary = 0;
                $shipping->is_active = 1;
                $shipping->is_deleted = 0;
                $shipping->save();
                
                Session::flash('message', 'Shipping address Sucessfully!');
            }
			return redirect()->to('/addShipping');
        }

        return view('front.user.add_shipping',compact('address','countries','state','city'));
    }
    public function viewShippingAddress()
    {
        $address = DB::table('shipping_address')
						->join('master_country', 'shipping_address.country_id', '=', 'master_country.country_id')
                        ->join('master_state', 'shipping_address.state_id', '=', 'master_state.state_id')
                        ->join('master_city', 'shipping_address.city_id', '=', 'master_city.city_id')
						->where('shipping_address.customer_id', auth('user')->id())
						->where('shipping_address.is_deleted', '0')
						->select('shipping_address.*', 'master_country.country_name','master_state.state_name','master_city.city_name')
                        ->orderBy('shipping_address.id', 'desc')
						->get();
                        //dd($address->toSql(), $address->getBindings());
        return view('front.user.address_list',compact('address'));
    }
    public function addressStatus(Request $request)
	{
	   $result =  DB::table('shipping_address')
            ->where('id', $request->id)
            ->update(
                ['is_active' => $request->status]
            );
        if ($result){
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else{
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        }
		
	}
	public function deleteAddress($id){

		$result = DB::table('shipping_address')
    		->where('id', $id)
    		->update(['is_deleted' => 1]);

		if ($result > 0) {
			// Successfully updated at least one row
			Session::flash('message', 'Address deleted successfully!');
		} else {
			// No rows updated
			Session::flash('message', 'Failed to delete Addres or already deleted.');
		}

		return redirect()->to('/viewAddress');
	}
    public function mesurment()
	{
		return view("front.user.mesurment");
	}
}
