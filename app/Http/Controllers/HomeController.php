<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Product;
use App\Models\FebricType;
use App\Models\ProductImage;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use DB;
use Hash;

class HomeController extends Controller{

	public function index(){
		
		$latitude = session('latitude');
    	$longitude = session('longitude');
		
		return view("front/index",compact('latitude', 'longitude'));
	}
	public function storeLocation(Request $request)
	{
		// Save the location to the session
		session(['latitude' => $request->latitude, 'longitude' => $request->longitude]);

		return response()->json(['success' => true]);
	}
	public function login()
	{
		//This function is for login 
		if (Auth::guard('user')->check()) {
			// Redirect to the user dashboard if authenticated
			return redirect()->to('/customerDashboard');
		}
		return view("login");
	}
	public function loginchk(Request $request)
	{
		//This function is for login the customer
		$request->validate([
			"email" => "required|email",
			"password" => "required"
		]);
		
		if (Auth::guard("user")->attempt([
			"email_id" => $request->email,
			"password" => $request->password
		])) 
		{
			return redirect()->to('/customerDashboard');
		}
		else {
			// Flash a message and redirect back on failure
			return back()->with('error','Email  id & Password is incorrect');
		}
	}
	public function register()
	{
		//This is for new registeration
		if (Auth::guard('user')->check()) {
			// Redirect to the user dashboard if authenticated
			return redirect()->to('/customerDashboard');
		}
		return view("register");
	}
	public function signup(Request $request)
	{
		//This function is for signup the user
		$request->validate([
			"email_id" => "required|email",
			"password" => "required"
		]);
		$user = User::where('email_id', $request->email_id)->first();
		if($user)
		{
			return back()->with('error','Email  id already exist as customer , please login');
		}
		else
		{
			$user = new User;
			$user->first_name = trim($request->first_name);
			$user->email_id = $request->email_id;
			$user->password = Hash::make($request->password);
			$user->user_status = "1";
			$user->customer_type = "0";
			$user->is_social= "0";
			$user->is_deleted= "0";
			$user->save();
			$user_id = $user->id;
			Session::flash('message', 'User Inserted Sucessfully!');

			return redirect()->to('/login');
		}
	}
	// public function customer()
	// {
	// 	if (Auth::guard('user')->check()) {
	// 		// Redirect to the user dashboard if authenticated
	// 		return view('front.user.dashboard');
	// 	}
	// 	else{
	// 		return redirect()->to('/login');
	// 	}
	// }
	// public function vendorsDasboard()
	// {
	// 	if (Auth::guard('vendor')->check()) {
	// 		// Redirect to the user dashboard if authenticated
	// 		return view('front.vendor.dashboard');
	// 	}
	// 	else{
	// 		return redirect()->to('/login');
	// 	}
	// }

	public function vendorLogin(Request $request)
	{
		//This function is for login the vendor
		if (Auth::guard('vendor')->check()) {
			// Redirect to the vendor dashboard if authenticated
			return redirect()->to('/vendorsDasboard');
		}
		if ($request->isMethod('post')) {
		
			if (Auth::guard("vendor")->attempt([
				"email" => $request->email,
				"password" => $request->password
			])) 
			{
				return redirect()->to('/vendorsDasboard');
			}
			else {
				// Flash a message and redirect back on failure
				return back()->with('error','Email  id & Password is incorrect');
			}
		}
		return view('vendorlogin');
	}
	public function vendorSignup(Request $request)
	{
		//This function is for signup the vendor
		if (Auth::guard('vendor')->check()) {
			// Redirect to the vendor dashboard if authenticated
			return redirect()->to('/vendorsDasboard');
		}
		if ($request->isMethod('post')) {
			
			$request->validate([
				"email_id" => "required|email",
				"password" => "required"
			]);
			$user = Vendor::where('email', $request->email_id)->first();
			if($user)
			{
				return back()->with('error','Email  id already exist as Vendor , please login');
			}
			else
			{
				$user = new Vendor;
				$user->name = trim($request->first_name);
				$user->email = $request->email_id;
				$user->password = Hash::make($request->password);
				$user->vendor_status = "1";
				$user->vendor_type = "0";
				$user->is_social= "0";
				$user->is_deleted= "0";
				$user->save();
				$user_id = $user->id;
				Session::flash('message', 'User Inserted Sucessfully!');
	
				return redirect()->to('/vendorLogin');
			}

		}
		return view("vendorregistor");
		
	}
	public function logout(Request $request)
    {
        // Log out the authenticated user
        Auth::guard('web')->logout();
		Auth::guard('user')->logout();
		Auth::guard('vendor')->logout();

        // Clear all session data
        Session::flush();
        // Redirect to login or home page
        return redirect('/login')->with('status', 'You have been logged out successfully.');
    }
	public function searchTailor(Request $request)
	{
		//This function is for search the tailor list
		$data['tailors'] = Vendor::where('vendor_type','1')->get();
		return view("front/tailorlist",$data);
	}
	public function tailorDetails($id){
        $data['tailor'] = Vendor::where('vendor_id',$id)->first();
		return view("front/tailordetails",$data);
	}
	public function searchHome(Request $request)
	{
		//This function is for home page search
		$latitude = session('latitude');
    	$longitude = session('longitude');
	}
	public function browseFebrics(Request $request)
	{
		$data['FebricTypes'] = FebricType::where('is_active','1')->get();
		return view("front/browse_febric",$data);
	}
	public function febricMarchent($id)
	{
		$data['febricType']		 = FebricType::where('febric_type_id',$id)->first();
		$data['FebricTypes'] = FebricType::where('is_active','1')->get();
		//$data['fabric_products'] = Product::where('febric_type_id',$id)->get();

		
		
		$data['vendors'] = DB::table('vendors')
					->join('products', 'vendors.vendor_id', '=', 'products.vendor_id')
					->where('products.febric_type_id', $id)
					->where('products.product_type', 2)
					->select('vendors.*','products.*',)
					->distinct()
					->paginate(10);
					//->appends(['fabric_type_id' => $id]);
//echo "<pre>";print_r($data['vendors']);die();
					
		return view("front/febric_marchent",$data);
	}
	public function productDetail($id)
	{
		$data['vendor']			= Product::where('id',$id)->first();
		$data['category']		= Product::where('id',$id)->first();
		$data['categoryName']	= Category::where('category_id',$data['category']->category_id)->first();
		$data['relatedvendor']	= Product::where('vendor_id',$data['vendor']->vendor_id)->get();
		$data['product'] 		= Product::where('id',$id)->first();
		$data['productImages'] 	= ProductImage::where('product_id',$id)->get();
		return view("front/product_detail",$data);
	}	
	
	public function customerProfile(Request $request)
	{
		return view("front/customer_profile");
	}
	public function productList(Request $request)
	{
		return view("front/product_list");
	}
	public function vendorDash()
	{
		return view("front/vendor_dash");
	}
	public function mesurment()
	{
		return view("front/mesurment");
	}
	public function orderDetail()
	{
		return view("front/user/order_detail");
	}
}