<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use DB;

class ApiController extends Controller
{

    private $param;




public function register(Request $request)
{
    // Initialize the response array
    $response = [
        'status' => 0,
        'message' => '',
    ];

    // Collect input data
    $data_post = [
        'name' => $request->input('name', ''),
        'email_id' => $request->input('email_id', ''),
        'password' => $request->input('password', ''),
        'mobile_number' => $request->input('mobile_number', ''),
        'deviceid' => $request->input('deviceid', ''),
        'devicetype' => $request->input('devicetype', ''),
    ];

    // Validate the input data
    if (empty($data_post['name'])) {
        $response['errorcode'] = "40001";
        $response['message'] = "Name: Required parameter missing";
    } elseif (empty($data_post['email_id'])) {
        $response['errorcode'] = "40002";
        $response['message'] = "Email ID: Required parameter missing";
    } elseif (empty($data_post['password'])) {
        $response['errorcode'] = "40003";
        $response['message'] = "Password: Required parameter missing";
    } elseif (empty($data_post['mobile_number'])) {
        $response['errorcode'] = "40004";
        $response['message'] = "Mobile Number: Required parameter missing";
    } elseif (empty($data_post['deviceid'])) {
        $response['errorcode'] = "40005";
        $response['message'] = "Device ID: Required parameter missing";
    } elseif (empty($data_post['devicetype'])) {
        $response['errorcode'] = "40006";
        $response['message'] = "Device Type: Required parameter missing";
    } else {
        try {
            // Check if the email already exists
            if (User::where('email_id', $data_post['email_id'])->exists()) {
                $response['errorcode'] = "40007";
                $response['message'] = "The email ID is already registered.";
            }
            // Check if the mobile number already exists
            elseif (User::where('mobile_number', $data_post['mobile_number'])->exists()) {
                $response['errorcode'] = "40008";
                $response['message'] = "The mobile number is already registered.";
            } else {
                // Create a new user
                $user = User::create([
                    'first_name' => $data_post['name'],
                    'email_id' => $data_post['email_id'],
                    'password' => Hash::make($data_post['password']),
                    'mobile_number' => $data_post['mobile_number'],
                    'device_id' => $data_post['deviceid'],
                    'device_type' => $data_post['devicetype'],
                    'is_social' => "0",
                    'user_status' => "0", // Inactive until email is verified
                    'is_deleted' => "0",
                ]);

                // Generate OTP
                $otp = rand(100000, 999999);

                // Save OTP in the database
                $user->update(['otp' => $otp]);

                // Send OTP via email
                Mail::send('emails.email_otp', ['otp' => $otp], function ($message) use ($data_post) {
                    $message->to($data_post['email_id'])
                        ->subject('Verify Your Email');
                });

                // Generate a personal access token for the user
                $token = $user->createToken($data_post['email_id'])->plainTextToken;
                $user_opt=  Otp::create([
                    'user_id' => $user->id,
                    'user_type' => $request->user_type,
                    'otp_code' => $otp,
                    'otp_type' => "2",
                    'is_verify' => '0',
                ]);

                $user_otpdetail = Otp::where('id',$user_opt->id)->first();
                // Set success response
                $response['status'] = 1;
                $response['message'] = "User registered successfully. Please verify your email by OTP.";
                // $response['data'] = [
                //     'user_detail' => $user,
                //     'token' => $token,
                //     'user_otpdetail' => $user_otpdetail,
                // ];
                $response['data'] = array('token'=>$token,'user_detail'=>array($user),'user_otpdetail'=>array($user_otpdetail));
            }
        } catch (\Exception $e) {
            $response['errorcode'] = "50001";
            $response['message'] = "An unexpected error occurred: " . $e->getMessage();
        }
    }



    // Return the response as JSON
    return response()->json($response);
}


public function forget_pwd(Request $request)
{
    // echo "testfor";die;
    // Initialize response structure
    $response = [
        'status' => 0,
        'message' => '',
        'data' => []
    ];

    // Validate input


    try {
        $request->validate([
            'email_id' => 'required|email',
            'user_type' => 'required',
        ], [
            'email_id.required' => 'Email ID is required',
            'user_type.required' => 'User Type is required',
            'email_id.email' => 'Please provide a valid email address',
        ]);

        $emailId = trim($request->input('email_id'));
        // Check if the user exists
        $user = DB::table('users')->where('email_id', $emailId)->first();

        if ($user) {
            if ($user->user_status == 1) {
                // Generate OTP
                $otpCode = rand(100000, 999999);

                // Store OTP details
                $otpData = Otp::create([
                    'user_id' => $user->id,
                    'user_type' => $request->user_type,
                    'otp_type' => "1",
                    'otp_code' => $otpCode,
                    'is_verify' => "0",
                ]);

                Mail::send('emails.forgot_pwd', ['otp' => $otpCode], function ($message) use ($emailId) {
                    $message->to($emailId)
                        ->subject('Forgot Password');
                });


                // Prepare success response
                $response['status'] = 1;
                $response['message'] = "OTP has been sent to your email. Please verify it.";
                $response['data'] = [
                    'user_detail' => $user,
                    'otp_detail' => $otpData,
                ];
            } else {
                $response['status'] = 2;
                $response['errorcode'] = "50002";
                $response['message'] = "Sorry, your account is not active. Please verify your email ID via OTP.";
            }
        } else {
            $response['status'] = 0;
            $response['errorcode'] = "50003";
            $response['message'] = "The email ID is not registered with us. First Registered.";
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation errors
        $response['status'] = 0;
        $response['message'] = $e->validator->errors()->first();
    } catch (\Exception $e) {
        // Handle exceptions
        $response['status'] = 0;
        $response['errorcode'] = "50004";
        $response['message'] = "An error occurred: " . $e->getMessage();
    }

    // Return JSON response
    return response()->json($response);
}





public function verify_OTP(Request $request)
{
    // echo "test";die;
    $response = [
        'status' => 0,
        'message' => '',
        'data' => []
    ];


    // Collect input data
    $data_post = [
        'email_id' => $request->input('email_id', ''),
        'otp' => $request->input('otp', ''),
        'from' => $request->input('from', '')
    ];

    // Validate input data
    if (empty($data_post['email_id'])) {
        $response['errorcode'] = "20001";
        $response['message'] = "Email Id: Required parameter missing";
    } elseif (empty($data_post['otp'])) {
        $response['errorcode'] = "20002";
        $response['message'] = "Otp: Required parameter missing";
    } elseif (empty($data_post['from'])) {
        $response['errorcode'] = "20003";
        $response['message'] = "From: Required parameter missing";
    } else {

        try {

            $vefifyuser = User::where('email_id',$request->email_id)->first();

            // print_r($userdetail->id);die;

            if (!$vefifyuser) {
                $response['errorcode'] = "20005";
                $response['message'] = "Invalid Email Id.";
                return response()->json($response);
            }

            $verifyDetail = Otp::where('user_id',$vefifyuser->id)->where('is_verify',0)->first();

    // print_r($verifyDetail);die;


            if ($verifyDetail && $verifyDetail->is_verify == 1) {
                $response['errorcode'] = "20005";
                $response['message'] = "Your Otp has been expired.";
                return response()->json($response);
            }

          if($request->from == "2" ){
            $otpDetail = Otp::where('user_id',$vefifyuser->id)->where('is_verify',0)->where('otp_code',$request->otp)->first();


            // if ( $vefifyuser->user_status == 1) {
            //     $response['errorcode'] = "20005";
            //     $response['message'] = "You have already registered.";
            //     return response()->json($response);
            // }

            if ($otpDetail && $otpDetail->is_verify == 1) {
                $response['errorcode'] = "20005";
                $response['message'] = "You have already used this OTP.";
                return response()->json($response);
            }

            // print_r($otpDetail);die;
         if($otpDetail){
            $userdetial = User::where('id',$otpDetail->user_id)->first();

            // print_r($userdetial);die;
            $userdetial->user_status = 1;
            $userdetial->save();

            $otpDetail->is_verify = 1;
            $otpDetail->save();

            $response['status'] = 1;
            $response['message'] = "Sign Up: Success";
            $response['data'] = ['user_detail' => $userdetial ];
         }else{
            $response['errorcode'] = "20005";
            $response['message'] = "Invalid OTP. Please enter a valid OTP.";
         }


        }else{
           //Forgot password form = 1
           $otpDetail = Otp::where('user_id',$vefifyuser->id)->where('otp_code',$request->otp)->first();
         if($otpDetail){

            $userdetial = User::where('id',$otpDetail->user_id)->first();

            $otpDetail->is_verify = 1;
            $otpDetail->save();

            $response['status'] = 1;
            $response['message'] = "Password reset successfully";
            $response['data'] = array('user_detail'=>array($userdetial));
         }else{
            $response['errorcode'] = "20005";
            $response['message'] = "Invalid OTP. Please enter a valid OTP.";
         }
        }
        } catch (\Exception $e) {
            $response['errorcode'] = "50001";
            $response['message'] = "An unexpected error occurred: " . $e->getMessage();
        }
    }

    // Return response as JSON
    return response()->json($response);
}
    public function login(Request $request)
    {
        // Initialize the response array
        $response = [
            'status' => 0,
            'message' => '',
        ];

        // Collect input data
        $data_post = [
            'username' => $request->input('mobileno', ''),
            'password' => $request->input('password', ''),
            'user_type' => $request->input('user_type', ''),
        ];

        // Validate the input data
        if (empty($data_post['username'])) {
            $response['errorcode'] = "40001";
            $response['message'] = "Mobileno or Email: Required parameter missing";
        } elseif (empty($data_post['password'])) {
            $response['errorcode'] = "40002";
            $response['message'] = "Password: Required parameter missing";
        } elseif (empty($data_post['user_type'])) {
            $response['errorcode'] = "40005";
            $response['message'] = "user_type: Required parameter missing";
        } else {
            // Process the login if all required parameters are provided
            $field_name = is_numeric($data_post['username']) ? 'mobile_number' : 'email_id';

            // Simulated login logic (replace with actual database query or authentication)
            $user = User::where($field_name, $data_post['username'])->first();

            if ($user) {


            if ($user->user_status != 0) {
            if ($user && Hash::check($data_post['password'], $user->password)) {
                // Generate token and return success response
                $token = $user->createToken('auth_token')->plainTextToken;

                $response['status'] = 1;
                $response['message'] = 'Login successful';
                $response['data'] = array('user_detail'=>array($user),'token'=>$token);
            } else {
                // Invalid credentials
                // 'token' => $token,
                $response['errorcode'] = "40006";
                $response['message'] = "Invalid username or password";
            }
           }else{
                $response['errorcode'] = "40006";
                $response['message'] = "First you Verify your User Id with Otp then Login";
           }
        }else{
            $response['errorcode'] = "40006";
            $response['message'] = "Invalid username";
        }
        }

        // Return the response as JSON
        return response()->json($response);
    }

    public function measurement(Request $request)
    {
        echo "test";die;
        // Initialize the response array
        $response = [
            'status' => 0,
            'message' => '',
        ];

        // Collect input data
        $data_post = [
            'name' => $request->input('name', ''),
            'email_id' => $request->input('email_id', ''),
            'password' => $request->input('password', ''),
            'mobile_number' => $request->input('mobile_number', ''),
            'deviceid' => $request->input('deviceid', ''),
            'devicetype' => $request->input('devicetype', ''),
        ];

        // Validate the input data
        if (empty($data_post['name'])) {
            $response['errorcode'] = "40001";
            $response['message'] = "Name: Required parameter missing";
        } elseif (empty($data_post['email_id'])) {
            $response['errorcode'] = "40002";
            $response['message'] = "Email ID: Required parameter missing";
        } elseif (empty($data_post['password'])) {
            $response['errorcode'] = "40003";
            $response['message'] = "Password: Required parameter missing";
        } elseif (empty($data_post['mobile_number'])) {
            $response['errorcode'] = "40004";
            $response['message'] = "Mobile Number: Required parameter missing";
        } elseif (empty($data_post['deviceid'])) {
            $response['errorcode'] = "40005";
            $response['message'] = "Device ID: Required parameter missing";
        } elseif (empty($data_post['devicetype'])) {
            $response['errorcode'] = "40006";
            $response['message'] = "Device Type: Required parameter missing";
        } else {
            try {
                // Check if the email already exists
                if (User::where('email_id', $data_post['email_id'])->exists()) {
                    $response['errorcode'] = "40007";
                    $response['message'] = "The email ID is already registered.";
                }
                // Check if the mobile number already exists
                elseif (User::where('mobile_number', $data_post['mobile_number'])->exists()) {
                    $response['errorcode'] = "40008";
                    $response['message'] = "The mobile number is already registered.";
                } else {
                    // Create a new user
                    $user = User::create([
                        'first_name' => $data_post['name'],
                        'email_id' => $data_post['email_id'],
                        'password' => Hash::make($data_post['password']),
                        'mobile_number' => $data_post['mobile_number'],
                        'device_id' => $data_post['deviceid'],
                        'device_type' => $data_post['devicetype'],
                        'is_social' => "0",
                        'user_status' => "0", // Inactive until email is verified
                        'is_deleted' => "0",
                    ]);

                    // Generate OTP
                    $otp = rand(100000, 999999);

                    // Save OTP in the database
                    $user->update(['otp' => $otp]);

                    // Send OTP via email
                    Mail::send('emails.email_otp', ['otp' => $otp], function ($message) use ($data_post) {
                        $message->to($data_post['email_id'])
                            ->subject('Verify Your Email');
                    });

                    // Generate a personal access token for the user
                    $token = $user->createToken($data_post['email_id'])->plainTextToken;
                    $user_opt=  Otp::create([
                        'user_id' => $user->id,
                        'user_type' => $request->user_type,
                        'otp_code' => $otp,
                        'otp_type' => "2",
                        'is_verify' => '0',
                    ]);

                    $user_otpdetail = Otp::where('id',$user_opt->id)->first();
                    // Set success response
                    $response['status'] = 1;
                    $response['message'] = "User registered successfully. Please verify your email by OTP.";
                    // $response['data'] = [
                    //     'user_detail' => $user,
                    //     'token' => $token,
                    //     'user_otpdetail' => $user_otpdetail,
                    // ];
                    $response['data'] = array('token'=>$token,'user_detail'=>array($user),'user_otpdetail'=>array($user_otpdetail));
                }
            } catch (\Exception $e) {
                $response['errorcode'] = "50001";
                $response['message'] = "An unexpected error occurred: " . $e->getMessage();
            }
        }



        // Return the response as JSON
        return response()->json($response);
    }

public function social_login(Request $request)
{
    // echo "test";die;
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Validate input data
      $request->validate(
            [
                'name' => 'required|string|max:255',
                'mail_id' => 'required|email',
                'social_id' => 'required|string',
                'deviceid' => 'required|string',
                'devicetype' => 'required|in:1,2', // 1 for Android, 2 for iOS
            ],
            [
                'name.required' => 'Name is required.',
                'name.string' => 'Name must be a valid string.',
                'name.max' => 'Name may not be greater than 255 characters.',
                'mail_id.required' => 'Sender ID is required.',
                'mail_id.email' => 'Please provide a valid email address for the Sender ID.',
                'social_id.required' => 'Social ID is required.',
                'social_id.string' => 'Social ID must be a valid string.',
                'deviceid.required' => 'Device ID is required.',
                'deviceid.string' => 'Device ID must be a valid string.',
                'devicetype.required' => 'Device Type is required.',
                'devicetype.in' => 'Device Type must be either 1 (Android) or 2 (iOS).',
            ]
        );

         $social_type =  $request->social_type;
        if($request->social_type == 1){
            $field = "google_id";
        }elseif( $request->social_type == 2){
            $field = "facebook_id";
        }elseif( $request->social_type == 3){
            $field = "apple_id";
        }

        // echo $field;die;
        // Check if the user already exists based on social_id
        $user = User::where($field, $request->social_id)->first();




        if (!$user) {
            // Create a new user if not exists
            $user = new User;
            $user->first_name = trim($request->name);
            $user->$field = $request->social_id;
            $user->email_id = $request->mail_id;
            $user->device_id = $request->deviceid;
            $user->user_status = "1";
            $user->customer_type = "0";
            $user->is_social= "1";
            $user->save();
        }

        // Log the user in (optionally using tokens)
        $token = $user->createToken('social-login-token')->plainTextToken;

        $response['status'] = 1;
        $response['message'] = 'Social login successful.';
        $response['data'] = array('user_detail'=>array($user),'token'=>$token);

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation errors
        $response['status'] = 0;
        $response['message'] = $e->validator->errors()->first();
    } catch (\Exception $e) {
        // Handle other exceptions
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    return response()->json($response);
}

public function country_master(){
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try{

        $country = DB::table('master_country')->where('country_status','1')->get();

        $response['status'] = 1;
        $response['message'] = 'Country List.';
        $response['data'] = array('country_list'=>$country);
    } catch (\Exception $e) {
        // Handle other exceptions
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }
    return response()->json($response);
}

public function master_state(){
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try{

        $state = DB::table('master_state')->select('state_id','state_name','latitude','longitude')->where('state_country_id','161')->get();

        // print_r($state);die;
        $response['status'] = 1;
        $response['message'] = 'State Listing.';
        $response['data'] = array('state_list'=>$state);
    } catch (\Exception $e) {
        // Handle other exceptions
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }
    return response()->json($response);
}

public function master_city(Request $request){
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];
    $state_id = $request->state_id;

    try{

        $city = DB::table('master_city')->select('city_id','city_name','latitude','longitude')->where('city_state_id',$state_id)->get();

        // print_r($state);die;
        $response['status'] = 1;
        $response['message'] = 'City Listing.';
        $response['data'] = array('City_list'=>$city);
    } catch (\Exception $e) {
        // Handle other exceptions
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }
    return response()->json($response);
}


public function update_profile(Request $request)
{
    // print_r($request->all());die;
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Validation rules and custom messages
       $request->validate(
            [
                'name' => 'nullable|string|max:255',
                'lname' => 'nullable|string|max:255',
                'email_id' => 'nullable|email|users:unique',
                'mobile_number' => 'nullable|numeric|users:unique',
                'password' => 'nullable|string',
                'gender' => 'nullable|string',
                'address' => 'nullable|string',
                'country_id' => 'nullable|numeric',
                'state_id' => 'nullable|numeric',
                'city_id' => 'nullable|numeric',
                'zipcode' => 'nullable|numeric',
                'deviceid' => 'nullable|string',
                'devicetype' => 'nullable|in:1,2', // 1 for Android, 2 for iOS
            ],
            [
                'name.string' => 'Name must be a valid string.',
                'name.max' => 'Name may not be greater than 255 characters.',
                'lname.string' => 'Last name must be a valid string.',
                'lname.max' => 'Last name may not be greater than 255 characters.',
                'email_id.email' => 'Please provide a valid email address.',
                'mobile_number.numeric' => 'Mobile number must be numeric.',
                'password.string' => 'Password must be a valid string.',
                'gender.string' => 'Gender must be a valid string.',
                'address.string' => 'Address must be a valid string.',
                'country_id.numeric' => 'Country ID must be numeric.',
                'state_id.numeric' => 'State ID must be numeric.',
                'city_id.numeric' => 'City ID must be numeric.',
                'zipcode.numeric' => 'Zipcode must be numeric.',
                'deviceid.string' => 'Device ID must be a valid string.',
                'devicetype.in' => 'Device type must be either 1 (Android) or 2 (iOS).',
            ]
        );

        $id = $request->user_id;
        $user = User::find($id);

        if($user){
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = "cus" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/admin/uploads/user'), $imageName);
        } else {
            $imageName = $user->profile_image;  // Retain existing image if no new image is uploaded
        }

        DB::table('users')
        ->where('id', $id)
        ->update([
        'first_name' => trim($request->name),
        'last_name' => trim($request->lname),
        'email_id' => $request->email_id,
        'profile_image' => $imageName,
        'gender' => $request->gender,
        'mobile_number' => $request->mobile_number,
        'password' => Hash::make($request->password),
        'address' => $request->user_address,
        'city_id' => $request->city_id,
        'state_id' => $request->state_id,
        'zipcode' => $request->user_zipcode,
        'country_id' => $request->country_id,
        'device_id' => $request->deviceid,
        'device_type' => $request->devicetype,
        ]);



        $response['status'] = 1;
        $response['message'] = 'Profile updated successfully.';
        $response['data'] = array('user_detail'=>array($user));;

    }else{
        $response['status'] = 0;
        $response['message'] = 'Invalid User Id.';
        $response['data'] = "";
    }

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation errors
        $response['status'] = 0;
        $response['message'] = $e->validator->errors()->first();
    } catch (\Exception $e) {
        // Handle other exceptions
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    return response()->json($response);
}
public function home_page(Request $request)
{
    // print_r($request->all());die;
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        $banner_data = [];
        $banner_data = DB::table('banners')->where('is_active',1)->first();


      $vendor = Vendor::where('vendor_status',1)->orderBy('vendor_id','desc')->get();
    //   print_r($vendor);die;
    $vendorlist = [];
    foreach ($vendor as $key=>$value) {

        $vendorlist[] = array(
            "vendor_id"=> $value->vendor_id,
            "name"=> $value->name,
            "last_name"=> $value->last_name,
            "business_name"=> $value->business_name,
            "email"=> $value->email,
            "mobile_no"=> $value->mobile_no,
            "address"=> $value->address,
            // https://www.localhost/tailorhub/public/upload/vendortai1731676894.jpg
            // https://votivelaravel.in/tailor_hub/public/upload/vendor/tai1731906848.png
            "profile_img"=> url('public/upload/vendor/').$value->profile_img,
            "rating_count"=> $value->rating_count,
        );
    }

    //features Fabric
    $product = Product::join('febric_type_master','products.febric_type_id','=','febric_type_master.febric_type_id')->join('product_images','products.id','product_images.product_id')->select('products.*','febric_type_master.febric_type_name','product_images.product_image')->where('febric_type_master.is_active',"1")->where('products.is_available',"1")->where('products.is_active',"1")->where('products.is_deleted',"0")->get();

    $productlist = [];
    // print_r($product);die;
    foreach ($product as $key=>$provalue) {

        $productlist[] = array(
            "product_id"=> $provalue->id,
            "vendor_id"=> $provalue->vendor_id,
            "category_id"=> $provalue->category_id,
            "product_name"=> $provalue->product_name,
            "product_type"=> $provalue->product_type,
            "gender_type"=> $provalue->gender_type,
            "final_price"=> $provalue->final_price,
            "discount"=> $provalue->discount,
            "febric_type_id"=> $provalue->febric_type_id,
            "is_available"=> $provalue->is_available,
            "febric_type_name"=> $provalue->febric_type_name,
            "product_image"=> url('public/upload/vendor/').$provalue->profile_img,

        );
    }

  $catalogueDetail = DB::table('catalogue')->join('catalogue_images','catalogue.id','=','catalogue_images.catalogue_id')->get();

//   print_r($catalogueDetail);die;

  $Cataloguelist = [];
  foreach ($catalogueDetail as $key=>$catavalue) {

    $Cataloguelist[] = array(
        "catalogue_id"=> $catavalue->id,
        "vendor_id"=> $catavalue->vendor_id,
        "catalogue_name"=> $catavalue->catalogue_name,
        "start_price"=> $catavalue->start_price,
        // "product_type"=> $catavalue->product_type,
        "gender_type"=> $catavalue->gender_type,
        "catalogue_image"=> url('public/upload/vendor/').$catavalue->catalogue_image,

    );
}
//   print_r($catalogueDetail);die;

    $response['status'] = 1;
    $response['message'] = 'Home Page Listing.';
    $response['data'] = array('Banner_data'=>array($banner_data),'features_tailor'=>$vendorlist,'features_fabric'=>$productlist,'features_design'=>$Cataloguelist);
    } catch (\Exception $e) {

        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    return response()->json($response);
}


public function fabric_list()
{
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Query to get tailors with their speciality names
        $fabric_detail = DB::table('febric_type_master')
                    ->where('is_deleted', 0)
                    ->where('is_active', 1)
                    ->get();

                    // print_r($fabric_detail);die;
        // Initialize vendor list
        $vendorlist = [];
        foreach ($fabric_detail as $value) {

            $vendorlist[] = [
                "fabric_type_id" => $value->febric_type_id,
                "fabric_name" => $value->febric_type_name,
            ];
        }

        // Prepare the response
        $response['status'] = 1;
        $response['message'] = 'Tailor Listing.';
        $response['data'] = ['fabric_data' => $vendorlist];

    } catch (\Exception $e) {
        // Catch any errors and prepare the error response
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    // Return JSON response
    return response()->json($response);
}

public function tailor_details(Request $request)
{
    // echo "test12";die;
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Query to get tailors with their speciality names
        $tailor_detail = [];
        $tailor_detail = DB::table('vendors')
                    ->where('vendor_status', 1)
                    ->where('vendor_id', $request->vendor_id)
                    ->whereIn('vendor_type', [1, 3])
                    ->whereNull('deleted_at')
                    ->get();



        $review_detail = DB::table('reviews')
                      ->select('reviews.id as review_id','users.id as user_id',"reviews.message","reviews.rate",'users.first_name',"users.last_name","users.email_id",'users.profile_image')

                      ->join('users','reviews.user_id','users.id')
                      ->where('reviews.vendor_id',$request->vendor_id)
                      ->get();

                      $count = DB::table('reviews')
                      ->where('status', 1)
                      ->where('vendor_id', $request->vendor_id)
                      ->count();

                      $total = DB::table('reviews')
                      ->where('status', 1)
                      ->where('vendor_id', $request->vendor_id)
                      ->sum('rate');

                      $tailor_rating = $total / $count;
                    //   print_r($tailor_rating);die;

                 if($tailor_rating){
                     $tailor_rate = $tailor_rating;
                 }else{
                    $tailor_rate = "";
                 }
            foreach ($review_detail as $value) {

            $tailor_review = [];
            $tailor_review[] = array(
                "review_id"=> $value->review_id,
                "user_id"=> $value->user_id,
                "message"=> $value->message,
                "first_name"=> $value->first_name,
                "last_name"=> $value->last_name,
                "email_id"=> $value->email_id,
                "profile_image"=> url('public/upload/vendor/').$value->profile_image,

            );
        }


        // Prepare the response
        $response['status'] = 1;
        $response['message'] = 'Tailor Listing.';
        $response['data'] = ['Tailor_data' => $tailor_detail,'tailor_rating'=> $tailor_rate ,'tailor_review' => $tailor_review];

    } catch (\Exception $e) {
        // Catch any errors and prepare the error response
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    // Return JSON response
    return response()->json($response);
}
public function tailor_design(Request $request)
{
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Query to get catalogues for the vendor
        $catalogue_detail = DB::table('catalogue')
            ->where('catalogue.is_active', 1)
            ->where('catalogue.is_deleted', 0)
            ->where('catalogue.vendor_id', $request->vendor_id)
            ->get();

        $catalogue_list = []; // Initialize an array for the catalogues

        foreach ($catalogue_detail as $value) {
            // Get catalogue images for each catalogue
            $catalogue_images = DB::table('catalogue_images')
                ->where('catalogue_id', $value->id)
                ->pluck('catalogue_image') // Fetch only the images
                ->toArray(); // Convert to array for easy handling

            // Add catalogue details to the list
            $catalogue_list[] = [
                "catalogue_id" => $value->id,
                "catalogue_name" => $value->catalogue_name,
                "catalogue_price" => $value->start_price,
                "catalogue_images" => array_map(function ($image) {
                    return url('public/upload/catalogue_images/') . $image; // Append full URL
                }, $catalogue_images),
            ];
        }

        // Prepare the response
        $response['status'] = 1;
        $response['message'] = 'Catalogue Listing.';
        $response['data'] = ['catalogue_detail' => $catalogue_list];
    } catch (\Exception $e) {
        // Catch any errors and prepare the error response
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    // Return JSON response
    return response()->json($response);
}

public function tailor_designdfd(Request $request){
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Query to get tailors with their speciality names
        $catalogue_detail = DB::table('catalogue')
                    // ->select('catalogue.id as catalogue_id','catalogue.catalogue_name','catalogue_images.catalogue_image')
                    // ->join('catalogue_images','catalogue.id','catalogue_images.catalogue_id')
                    ->where('catalogue.is_active', 1)
                    ->where('catalogue.is_deleted', 0)
                    ->where('catalogue.vendor_id', $request->vendor_id)
                    ->get();


                    // print_r($catalogue_detail);die;
                    $vendorlist = [];
                    foreach ($catalogue_detail as $value) {

                        $catelogue_images = DB::table('catalogue_images')
                        ->where('catalogue_id', $value->id)
                        ->get();

                        // $special_name = DB::table('speciality_master')
                        // ->whereIn('speciality_id', $tailor_speciality)
                        // ->pluck('speciality_name')
                        // ->toArray();
                        // print_r($catelogue_images);die;

                        $catalogue[] = [
                            "vendor_id" => $value->id,
                            "catalogue_name" => $value->catalogue_name,
                            // Uncomment and use this line if `speciality_names` is part of your query
                            "profile_img" => url('public/upload/vendor/') . $catelogue_images->catalogue_image,
                        ];
                    }

        // Prepare the response
        $response['status'] = 1;
        $response['message'] = 'Catalougue Listing.';
        $response['data'] = ['catalogue_detail' => $catalogue];

    } catch (\Exception $e) {
        // Catch any errors and prepare the error response
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    // Return JSON response
    return response()->json($response);
}
public function tailor_list()
{
    $response = [
        'status' => 0,
        'message' => '',
        'data' => null
    ];

    try {
        // Query to get tailors with their speciality names
        $tailor_detail = DB::table('vendors')
                    ->where('vendors.vendor_status', 1)
                    ->whereIn('vendors.vendor_type', [1, 3])
                    ->whereNull('vendors.deleted_at')
                    ->get();

        // Initialize vendor list
        $vendorlist = [];
        foreach ($tailor_detail as $value) {

            $tailor_speciality = DB::table('tailor_specialitys')
            ->where('vendor_id', $value->vendor_id)
            ->pluck('speciality_id');

            $special_name = DB::table('speciality_master')
            ->whereIn('speciality_id', $tailor_speciality)
            ->pluck('speciality_name')
            ->toArray();
            // print_r($tailor_speciality);die;

            $vendorlist[] = [
                "vendor_id" => $value->vendor_id,
                "vendor_name" => $value->name,
                "last_name" => $value->last_name,
                "business_name" => $value->business_name,
                "email" => $value->email,
                "mobile_no" => $value->mobile_no,
                "address" => $value->address,
                "country_id" => $value->country_id,
                "state_id" => $value->state_id,
                "city_id" => $value->city_id,
                "zip_code" => $value->zip_code,
                "plan_id" => $value->plan_id,
                // Uncomment and use this line if `speciality_names` is part of your query
                "speciality_name" => $special_name,
                "profile_img" => url('public/upload/vendor/') . $value->profile_img,
            ];
        }

        // Prepare the response
        $response['status'] = 1;
        $response['message'] = 'Tailor Listing.';
        $response['data'] = ['Tailor_data' => $vendorlist];

    } catch (\Exception $e) {
        // Catch any errors and prepare the error response
        $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }

    // Return JSON response
    return response()->json($response);
}



public function logout(Request $request)
{
    try {
        // Revoke all tokens for the authenticated user
        $request->user()->tokens()->delete();

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'User logged out successfully',
            'data' => null,
        ], 200);
    } catch (\Exception $e) {
        // Handle unexpected errors
        return response()->json([
            'status' => 0,
            'message' => 'An unexpected error occurred: ' . $e->getMessage(),
        ], 500);
    }
}

}
