<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\FebricType;
use App\Models\Catalogue;
use App\Models\CatalogueImages;
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

	public function migrateGuestCartToUser()
	{
		$guestCart = session()->get('guest_cart', []);
		if (!empty($guestCart) && auth('user')->check()) {
			$customerId = auth('user')->id();
			$cart = Cart::firstOrCreate(['customer_id' => $customerId]);

			foreach ($guestCart as $productId => $item) {
				$existingCartDetail = CartDetail::where('cart_id', $cart->id)
					->where('product_id', $productId)
					->first();

				if (!$existingCartDetail) {
					CartDetail::create([
						'cart_id' => $cart->id,
						'product_id' => $productId,
						'quantity' => $item['quantity'],
					]);
				}
			}

			// Clear the guest cart from the session
			session()->forget('guest_cart');
		}
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
			// Transfer the session cart to the database cart
			$this->migrateGuestCartToUser();

			// Redirect to the customer dashboard
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
	/**************************[Browse Tailors Start]***********************************/
	public function searchTailor(Request $request)
	{
		//This function is for search the tailor list
		$customerId = auth('user')->id(); // Get the logged-in customer ID

		$tailors = DB::table('vendors as v')
			->leftJoinSub(
				DB::table('tailor_specialitys as ts')
					->leftJoin('speciality_master as sp', 'ts.speciality_id', '=', 'sp.speciality_id')
					->select('ts.vendor_id', DB::raw('GROUP_CONCAT(sp.speciality_name) as specialities'))
					->groupBy('ts.vendor_id'),
				'specialities',
				'v.vendor_id',
				'=',
				'specialities.vendor_id'
			)
			->leftJoin('vendor_likes as vl', function ($join) use ($customerId) {
				$join->on('v.vendor_id', '=', 'vl.vendor_id')
					->where('vl.customer_id', '=', $customerId);
			})
			->select(
				'v.*',
				'specialities.specialities',
				DB::raw('IF(vl.id IS NOT NULL, 1, 0) as is_liked') // Check if the vendor is liked by the customer
			)
			->where('v.vendor_status', 1)
			->whereIn('v.vendor_type', [1, 3])
			->paginate(3);

		return view("front.tailorlist",compact('tailors'));
	}
	public function likeVendor(Request $request)
	{

		if (Auth::guard('user')->check()) {

			$vendor_id=$request->vendor_id;
			$like=VendorLike::where('vendor_id',$vendor_id)->where('customer_id',auth('user')->id())->first();

			if($like)
			{
				DB::table('vendor_likes')->where('customer_id',auth('user')->id())->where('vendor_id',$vendor_id)->delete();
				return response()->json(['success' => true, 'message' => 'disliked']);
			}
			else
			{
				//DB::enableQueryLog();
				$likes = new VendorLike;
                $likes->customer_id = auth('user')->id();
                $likes->vendor_id = $vendor_id;
                $likes->created_at = date('Y-m-d H:i:s');
                $likes->save();
				//dd(DB::getQueryLog());die();
			}
			return response()->json(['success' => true, 'message' => 'liked']);
		}
		else{
			return response()->json(['error' => true, 'message' => 'Failed to update status']);
		}
	}
	public function tailorDetails($id){
		$customerId = auth('user')->id();


		$data['tailor'] = Vendor::query()
						->where('vendors.vendor_id', $id) // Qualify the column with the table name
						->when($customerId, function ($query, $customerId) {
							return $query->leftJoin('vendor_likes as vl', function ($join) use ($customerId) {
								$join->on('vl.vendor_id', '=', 'vendors.vendor_id')
									->where('vl.customer_id', '=', $customerId);
							})
							->addSelect([
								'vendors.*', // Include vendor fields
								'vl.id as like_id', // Include specific fields from likes table
								DB::raw('IF(vl.id IS NOT NULL, 1, 0) as is_liked') // Conditional `is_liked`
							]);
						})
						->first();

		return view("front/tailordetails",$data);
	}
	public function tailorCatalogue($id,$category_id=null)
	{
		//This function is for view the vendor catalogue from vendor detail page
		$data['vendor'] = Vendor::where('vendor_id',$id)->first();
		$data['category'] = Category::where('is_active','1')->where('is_deleted','0')->get();

		$data['catalogue'] = DB::table('catalogue as c')
								->join('category as cat', 'c.category_id', '=', 'cat.category_id')
								->leftJoinSub(
									DB::table('catalogue_images as ci')
										->select('ci.catalogue_id', DB::raw('MIN(ci.catalogue_image) as catalogue_image')) // Fetch one image
										->groupBy('ci.catalogue_id'),
									'catalogue_images',
									'c.id',
									'=',
									'catalogue_images.catalogue_id'
								)
								->select(
									'c.*',
									'cat.category_name',
									'catalogue_images.catalogue_image' // Include the single image from subquery
								)
								->where('c.vendor_id', $id)
								->where('c.is_active', '1')
								->where('c.is_deleted', '0')
								->when($category_id, function ($query, $category_id) {
									return $query->where('c.category_id', $category_id); // Apply category filter if $category_id is present
								})
								->orderBy('c.id', 'desc')
								->paginate(3);



		//echo "<pre>";print_r($data['vendor']);die();
		return view('front.tailor_catalogue',$data);
	}
	/**************************[Browse Tailors End]***********************************/
	public function searchHome(Request $request)
	{
		//This function is for home page search
		$latitude = session('latitude');
    	$longitude = session('longitude');
	}

	public function exploredesign(Request $request)
	{
		// echo "test";die;
		$data['CategoryType'] = Category::where('is_active','1')->where('is_deleted','0')->get();
		// echo "<Pre>";print_r($data);die;
		return view("front/explore_design",$data);
	}
	public function tailor_design($id)
	{
		// echo "test";die;
		$data['categoryType'] = Category::where('category_id',$id)->where('is_deleted','0')->first();
		$data['CategoryTypes'] = Category::where('is_active','1')->where('is_deleted','0')->get();
		// $data['FebricTypes'] = Category::where('is_active','1')->get();
		// echo "<pre>";print_r($data['CategoryTypes']);die;
		//$data['fabric_products'] = Product::where('febric_type_id',$id)->get();



		$data['vendors'] = DB::table('vendors')
					->join('catalogue', 'vendors.vendor_id', '=', 'catalogue.vendor_id')
					->where('catalogue.category_id', $id)

					->select('vendors.*','catalogue.*',)
					->distinct()
					->paginate(10);


	//   $data['catalogue_image'] = DB::table('catalogue_images')->where('catalogue_id',$)
					// ->appends(['fabric_type_id' => $id]);
// echo "<pre>";print_r($data['vendors']);die();

		return view("front/tailor_design",$data);
	}
	public function catalogueDetail($id)
	{
		$data['customer_id']=0;
		if (Auth::guard('vendor')->check()) {
			
			$data['customer_id']= auth('user')->id();
		}
		
		$data['catalogue']		= Catalogue::where('id',$id)->first();
		$data['catalogue_image'] = CatalogueImages::where('catalogue_id',$id)->first();
		$data['related_image'] = CatalogueImages::where('catalogue_id',$id)->get();
		
        $data['vendor'] = Vendor::where('vendor_id',$data['catalogue']->vendor_id)->first();

        
		$data['relatedcatalogue'] = DB::table('catalogue')
						->leftJoin('catalogue_images', function ($join) {
							$join->on('catalogue.id', '=', 'catalogue_images.catalogue_id')
									->whereRaw('catalogue_images.id = (SELECT MIN(id) FROM catalogue_images WHERE catalogue_id = catalogue.id)');
						})
						->select('catalogue.*', 'catalogue_images.catalogue_image')
						->limit(5)
						->where('catalogue.id','!=',$id)
						->get();
		
		return view("front/catalogue_detail",$data);
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
	public function wishlist()
	{
		return view("front/user/wish_list");
	}
		public function message()
	{
		return view("front/user/message");
	}
		public function support()
	{
		return view("front/user/support");
	}
	   public function order_history()
	{
		return view("front/user/order_history");
	}
	   public function shipping_add()
	{
		return view("front/user/shipping_add");
	}
       public function shipping_view()
	{
		return view("front/user/shipping_view");
	}
	       public function view_cart()
	{
		return view("front/user/view_cart");
	}




}