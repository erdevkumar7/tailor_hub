<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shipping;
use App\Models\SupportTicket;
use App\Models\SupportDetail;
use App\Models\Measurment;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
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

    public function customerWishList()
    {
        // $wishlistItems = DB::table('wishlists')->where('customer_id', auth('user')->id())->get();           
        $wishlistItems = Wishlist::where('customer_id', auth('user')->id())
            ->with('product')
            ->get();    
        // return response()->json($wishlistItems);

        return view('front.user.wish_list', compact('wishlistItems'));
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
                    
                // DB::table('shipping_address')
                //     ->where('id', $request->address_id)
                //     ->update([
                //     'address_name' => trim($request->address_name),
                //     'country_id' => $request->country_id,
                //     'state_id' => $request->state_id,
                //     'city_id' => $request->city_id,
                //     'address_line_1' => $request->address_line_1,
                //     'address_line_2'=>$request->address_line_2,
                //     'landmark' => $request->landmark,
                //     'postal_code' => $request->postal_code,
                    
                // ]);
                DB::table('shipping_address')
                    ->where('id', $request->address_id)
                    ->update([
                    'is_deleted' => 1,
                    'is_active'=>0,
                    'is_primary'=>0
                ]);
                 
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
			return redirect()->to('/shippingAddress');
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
	public function shippingAddressList()
    {
        //This function is for view the customer shipping address
        $address = DB::table('shipping_address')
						->join('master_country', 'shipping_address.country_id', '=', 'master_country.country_id')
                        ->join('master_state', 'shipping_address.state_id', '=', 'master_state.state_id')
                        ->join('master_city', 'shipping_address.city_id', '=', 'master_city.city_id')
						->where('shipping_address.customer_id', auth('user')->id())
						->where('shipping_address.is_deleted', '0')
						->select('shipping_address.*', 'master_country.country_name','master_state.state_name','master_city.city_name')
                        ->orderBy('shipping_address.is_primary', 'desc')
                        ->orderBy('shipping_address.id', 'desc')
						->get();

        return view("front.user.address_list",compact('address'));                
    }
	public function defaultAddress(Request $request)
    {
        //This function is for change default address
        $addr_id    = $request->addr_id;

        DB::table('shipping_address')
            ->where('customer_id', auth('user')->id())
            ->update(
                ['is_primary' => 0]
            );
        $result = DB::table('shipping_address')
                ->where('id', $addr_id)
                ->update(
                    ['is_primary' => 1]
                );    
        if ($result){
            return response()->json(['success' => true, 'message' => 'Default address set successfully']);
        } else{
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        } 
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
	
	/**********************************[SUPPORT TICKET START]*****************************************/

    public function createTicket(Request $request)
    {
        //This function is for create new Ticket
        if ($request->isMethod('post')) {
            
            $ticket=new SupportTicket;

            $ticket->ticket_id=time()+rand(10,100);
            $ticket->order_id=$request->order_id;
            $ticket->customer_id=auth('user')->id();
            $ticket->ticket_subject=$request->subject;
            $ticket->related_to=$request->support_type;
            $ticket->ticket_text=$request->message;
            $ticket->last_sender=auth('user')->id();
            $ticket->is_closed=0;
            $ticket->created_at=date('Y-m-d H:i:s');
            $ticket->save();
                
            Session::flash('message', 'Ticket Created Sucessfully!');
            return redirect()->to('/ticketList');
        }
        return view('front.user.create_ticket');
    }
    public function supportTicketList()
    {
        
        $supportTickets = DB::table('support_tickets as s')
                            ->leftJoinSub(
                                DB::table('support_details')
                                    ->select('support_id', 'detail_text as message', 'created_at')
                                    ->whereIn('sdetail_id', function ($query) {
                                        $query->selectRaw('MAX(sdetail_id)')
                                            ->from('support_details')
                                            ->groupBy('support_id');
                                    }),
                                'sr',
                                's.id',
                                '=',
                                'sr.support_id'
                            )
                            ->select(
                                's.*',
                                DB::raw("
                                    CASE 
                                        WHEN sr.message IS NOT NULL THEN sr.message 
                                        ELSE s.ticket_text 
                                    END AS last_message
                                "),
                                DB::raw("
                                    CASE 
                                        WHEN sr.created_at IS NOT NULL THEN sr.created_at 
                                        ELSE s.created_at 
                                    END AS last_message_time
                                "),
                                DB::raw("
                                    CASE 
                                        WHEN s.last_sender IS NULL OR TRIM(s.last_sender) = '' THEN 0
                                        WHEN TRIM(s.last_sender) = '".auth('user')->id()."' THEN 0
                                        ELSE 1
                                    END AS is_read
                                ")
                            )
							->where('s.customer_id', auth('user')->id())
                            ->orderBy('is_read', 'DESC') // Order by is_read (unread first)
                            ->get();





            //echo "<pre>";print_r($supportTickets);die();
        return view('front.user.support_list',compact('supportTickets'));
    }
    public function replySupportTicket(Request $request,$id)
    {
        //This function is for reply the support ticket
        $ticket = DB::table('support_tickets')
						->where('id', $id)
						->first();
        
        $replylist = DB::table('support_details')
						->where('support_id', $id)
						->get();                
                        //echo "<pre>";print_r($ticket);die();
        if ($request->isMethod('post')) {

            $ticket=new SupportDetail;
            $ticket->support_id=$id;
            $ticket->sender_id=auth('user')->id();
            $ticket->sender_type=1;
            $ticket->detail_text=$request->reply_text;
            $ticket->created_at=date('Y-m-d H:i:s');
            $ticket->save();
             
            //now update the id in support ticket table
            DB::table('support_tickets')
                  ->where('id', $id)
                  ->update([
                        'last_sender' => auth('user')->id()
                    ]);
                    
            Session::flash('message', 'Reply Sucessfully!');
            return redirect()->to('/ticketList');
        }                
        return view('front.user.support_reply',compact('ticket','replylist'));
    }
    /**********************************[SUPPORT TICKET END]*******************************************/
	
   /**********************************[MEASURMENT START]*******************************************/
    public function mesurment(Request $request,$id=null)
	{
        //This function is for add measurment for customer
        $measur="";
        if($id)
        {
            $measur = DB::table('measurements')
						->where('id', $id)
						->first();
        }

        if ($request->isMethod('post')) {
            if($request->id)
            {
                DB::table('measurements')
                    ->where('id', $request->id)
                    ->update([
                        'measurment_title'      => trim($request->measurment_title),
                        'full_soulder'          => $request->full_soulder,
                        'full_sleeves'          => $request->full_sleeves,
                        'full_chest'            => $request->full_chest,
                        'waist_stomach'         => $request->waist_stomach,
                        'hips'                  => $request->hips,
                        'front_chest'           => $request->front_chest,
                        'back_chest_length'     => $request->back_chest_length,
                        'jacket'                => $request->jacket,
                        'pant_waist'            => $request->pant_waist,
                        'low_hip_pant'          => $request->low_hip_pant,
                        'thigh'                 => $request->thigh,
                        'full_crotch'           => $request->full_crotch,
                        'pant_length'           => $request->pant_length,
                        'bicep_arms'            => $request->bicep_arms,
                        'neck'                  => $request->neck
                    ]);
                Session::flash('message', 'Measurment Updated Successfully!');
            }
            else
            {
                $measurment = new Measurment;
                $measurment->measurment_title   = $request->measurment_title;
                $measurment->user_id            = auth('user')->id();
                $measurment->full_soulder       = $request->full_soulder;
                $measurment->full_sleeves       = $request->full_sleeves;
                $measurment->full_chest         = $request->full_chest;
                $measurment->waist_stomach      = $request->waist_stomach;
                $measurment->hips               = $request->hips;
                $measurment->front_chest        = $request->front_chest;
                $measurment->back_chest_length  = $request->back_chest_length;
                $measurment->jacket             = $request->jacket;
                $measurment->pant_waist         = $request->pant_waist;
                $measurment->low_hip_pant       = $request->low_hip_pant;
                $measurment->thigh              = $request->thigh;
                $measurment->full_crotch        = $request->full_crotch;
                $measurment->pant_length        = $request->pant_length;
                $measurment->bicep_arms         = $request->bicep_arms;
                $measurment->neck               = $request->neck;

                $measurment->is_active          = '1';
                $measurment->is_delete          = '0';
                $measurment->created_at         = date('Y-m-d H:i:s');

                $measurment->save();

                Session::flash('message', 'Measurment Added Successfully!');
            }
            return redirect()->to('/viewMeasurment');
        }
		return view("front.user.mesurment",compact('measur'));
	}
    public function measurmentList()
    {
        //This function is for show the measurment list
        $measurement = DB::table('measurements')
						->where('measurements.user_id', auth('user')->id())
                        ->where('measurements.is_delete', '0')
						->orderBy('measurements.id', 'desc')
                        ->get();

        return view('front.user.measurment_list',compact('measurement'));	
    }
    public function deleteMeasurment($id)
    {

		$result = DB::table('measurements')
    		->where('id', $id)
    		->update(['is_delete' => 1]);

		if ($result > 0) {
			// Successfully updated at least one row
			Session::flash('message', 'Measurment deleted successfully!');
		} else {
			// No rows updated
			Session::flash('message', 'Failed to delete Measurment or already deleted.');
		}
		return redirect()->to('/viewMeasurment');
	}
    /**********************************[MEASURMENT END]*******************************************/
}
