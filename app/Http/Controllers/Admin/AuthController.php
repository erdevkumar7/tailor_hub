<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class AuthController extends Controller
{
    public function index(){
    	if (Auth::guard('admin')->check()) {

			return redirect('/admin/dashboard');
		}
        return view('admin.adminlogin');
    }

    public function adminlogin(Request $request)
{
    // Validate the request
    $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);

    $remember = $request->has('remember');

    // Attempt to authenticate the admin
    if (Auth::guard("admin")->attempt([
        "email" => $request->email,
        "password" => $request->password
    ])) {
        // Set cookies if remember me is checked
        if ($remember) {
            setcookie("email", $request->email, time() + 3600, "/", "", false, true);
            setcookie("password", $request->password, time() + 3600, "/", "", false, true);
            setcookie("remember", 1, time() + 3600, "/", "", false, true);
        } else {
            // Clear cookies if remember me is not checked
            setcookie("email", "", time() - 3600, "/", "", false, true);
            setcookie("password", "", time() - 3600, "/", "", false, true);
            setcookie("remember", "", time() - 3600, "/", "", false, true);
        }

        // Redirect to the admin dashboard
        return redirect()->route('admindashboard');
    } else {
        // Flash a message and redirect back on failure
        return back()->with('error','Username & Password is incorrect');
    }
}


    public function admindashboard(){
        return view('admin.dashboard');
    }

    public function adminLogout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/admin');
    }


}
