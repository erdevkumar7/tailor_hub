<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Session;
use Validator;
use DB;
use Hash;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
       
       
        $user = User::where('email_id', $googleUser->email)
                ->where('is_social', 1)
                ->where('google_id', $googleUser->id)
                ->first();
        if(!$user)
        {
            $user = new User;
			$user->first_name = trim($googleUser->name);
			$user->email_id = $googleUser->email;
			$user->google_id = $googleUser->id;
			$user->user_status = "1";
			$user->customer_type = "0";
			$user->is_social= "1";
			$user->is_deleted= "0";
			$user->save();
			$user_id = $user->id;
 
        }
        Auth::guard('user')->login($user);

        // Check if the vendor is authenticated
    if (Auth::guard('user')->check()) {
        // Redirect to the vendor dashboard if authenticated
        
        return redirect()->to('/customerDashboard');
    } else {
        // Log debug info to help troubleshoot
        logger()->error('customer login failed.', [
            'user_id' => $user->id,
            'authenticated' => Auth::guard('user')->check()
        ]);
        return redirect()->to('/login')->with('error', 'Authentication failed.');
    }
        
    }
    public function redirectToGoogleVendor()
    {
        config([
            'services.google.client_id' => env('GOOGLE_CLIENT_ID_VEND'),
            'services.google.client_secret' => env('GOOGLE_CLIENT_SECRET_VEND'),
            'services.google.redirect' => env('GOOGLE_REDIRECT_URL_VEND'),
        ]);

        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallbackVendor()
    {
        config([
            'services.google.client_id' => env('GOOGLE_CLIENT_ID_VEND'),
            'services.google.client_secret' => env('GOOGLE_CLIENT_SECRET_VEND'),
            'services.google.redirect' => env('GOOGLE_REDIRECT_URL_VEND'),
        ]);
        $googleUser = Socialite::driver('google')->stateless()->user();
       
       
        $vendor = Vendor::where('email', $googleUser->email)
                    ->where('is_social', 1)
                    ->where('google_id', $googleUser->id)
                    ->first();

        if(!$vendor)
        {
            $vendor = new Vendor;
            $vendor->name = trim($googleUser->name);
            $vendor->email = $googleUser->email;
            $vendor->google_id = $googleUser->id;
            $vendor->password = '';  // Set an empty password for social login
            $vendor->vendor_status = "1";
            $vendor->vendor_type = "0";
            $vendor->is_social = "1";
            $vendor->is_deleted = "0";
            $vendor->save();
            $vendor_id = $vendor->vendor_id;
           
        }
        Auth::guard('vendor')->login($vendor);

        // Check if the vendor is authenticated
    if (Auth::guard('vendor')->check()) {
        // Redirect to the vendor dashboard if authenticated
        
        return redirect()->to('/vendorsDasboard');
    } else {
        // Log debug info to help troubleshoot
        logger()->error('Vendor login failed.', [
            'vendor_id' => $vendor->vendor_id,
            'authenticated' => Auth::guard('vendor')->check()
        ]);
        return redirect()->to('/login')->with('error', 'Authentication failed.');
    }
    }

}
