<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
// use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [ApiController::class, 'logout']);
});

Route::post('/update_profile', [ApiController::class, 'update_profile']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});


Route::post('/resendOtp', [ApiController::class, 'resendOtp']);
Route::get('/country_master', [ApiController::class, 'country_master']);
Route::get('/master_state', [ApiController::class, 'master_state']);
Route::post('/master_city', [ApiController::class, 'master_city']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/verify_otp', [ApiController::class, 'verify_otp']);
Route::post('/forgot_password', [ApiController::class, 'forget_pwd']);
Route::post('/social_login', [ApiController::class, 'social_login']);
Route::post('/resetPassword', [ApiController::class, 'resetPassword']);
// Route::middleware('auth:sanctum')->post('/logout', [ApiController::class, 'logout']);

// put in middleware
Route::get('/home_page', [ApiController::class, 'home_page']);
Route::post('/tailor_list', [ApiController::class, 'tailor_list']);
Route::get('/fabric_list', [ApiController::class, 'fabric_list']);
Route::post('/tailor_details', [ApiController::class, 'tailor_details']);
Route::post('/measurements', [ApiController::class, 'measuerements']);
Route::post('/tailor_design', [ApiController::class, 'tailor_design']);
Route::post('/tailor_design_detail', [ApiController::class, 'tailor_design_detail']);
Route::post('/fabric_category_list', [ApiController::class, 'fabric_category_list']);
Route::post('/fabric_category_details', [ApiController::class, 'fabric_category_details']);
Route::get('/fabric_filter_list', [ApiController::class, 'fabric_filter_list']);
Route::post('/addShipping', [ApiController::class, 'addShipping']);
Route::post('/setDefaultAddress', [ApiController::class, 'setDefaultAddress']);
Route::post('/delete_shipping_address', [ApiController::class, 'delete_shipping_address']);
