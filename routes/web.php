<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\CmsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TailorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**********************[ WEB SITE ROUTING START ]****************************/
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/google/redirectvend', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogleVendor'])->name('google.redirectvend');
Route::get('/google/callbackvendor', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallbackVendor'])->name('google.callbackvend');

Route::get('/register',[HomeController::class, 'register']);
Route::get('/login',[HomeController::class, 'login']);
Route::get('/newlogin',[HomeController::class, 'newlogin']);
Route::get('/newregister',[HomeController::class, 'newregister']);

Route::post('/loginchk', [HomeController::class, 'loginchk'])->name('customerlogin');
Route::any('/logout',[HomeController::class, 'logout']);
// Route::get('/customer',[HomeController::class, 'customer']);
Route::post('/signup',[HomeController::class, 'signup'])->name('signup');

Route::any('/vendorLogin', [HomeController::class, 'vendorLogin'])->name('vendorLoginForm');
Route::any('/vendorSignup', [HomeController::class, 'vendorSignup'])->name('vendorSignupForm');

// Route::get('/vendors',[HomeController::class, 'vendors']);

/**********************[ WEB SITE ROUTING END ]****************************/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [HomeController::class, 'index']);
Route::post('/store-location', [HomeController::class, 'storeLocation'])->name('store.location');
Route::any('/searchN', [HomeController::class, 'searchHome'])->name('searchHome');
/*****************************[Fabric seller search]****************************************/

Route::any('/exploreProducts', [ProductController::class, 'exploreProducts'])->name('exploreProducts');  //Erdev
Route::any('/productMarchent/{category_id}', [ProductController::class, 'machentByCategoryId'])->name('product.MachentByCategoryId'); //ErDev

Route::any('/browseFebrics', [HomeController::class, 'browseFebrics'])->name('browseFebrics');
Route::any('/febricMarchent/{id}', [HomeController::class, 'febricMarchent'])->name('febricMarchent');
Route::any('/productDetail/{id}', [HomeController::class, 'productDetail'])->name('productDetail');
/*****************************[Tailor search]****************************************/
Route::get('/AllTailors', [HomeController::class, 'searchTailor']);
Route::get('/tailorDetails/{id}', [HomeController::class, 'tailorDetails']);

//demo code route 
//Route::get('/customerProfiles', [HomeController::class, 'customerProfile']);
Route::get('/productList', [HomeController::class, 'productList']);
Route::get('/vendorDash', [HomeController::class, 'vendorDash']);
Route::get('/orderDetail', [HomeController::class, 'orderDetail']);

//Route::get('/AllTailors', [TailorController::class, 'index']);
//Route::get('/tailorDetails', [TailorController::class, 'tailorDetails']);
//Route::get('/tailorDetails/{id}', [TailorController::class, 'tailorDetails']);

/****************************[CUSTOMER AUTH START]************************************/
Route::group(['middleware'=>['web','checkUser']],function(){
    Route::any('/customerProfile', [CustomerController::class, 'updateProfile']);
    Route::post('/profile_update', [CustomerController::class, 'profile_update']);
	Route::get('/customerDashboard',[CustomerController::class, 'customerDashboard']);

    Route::get('/customerWishlist', [CustomerController::class, 'customerWishList'])->name('customer.wishList');  //Erdev
    
    Route::any('/addShipping/{id?}',[CustomerController::class, 'addShipping'])->name('addShipping');
    Route::any('/viewAddress',[CustomerController::class, 'viewShippingAddress']);
    Route::post('/addressStatus',[CustomerController::class, 'addressStatus'])->name('addressStatus');
    Route::get('/deleteAddress/{id}',[CustomerController::class, 'deleteAddress'])->name('deleteAddress');
    Route::get('/mesurment', [CustomerController::class, 'mesurment']);

});
/****************************[CUSTOMER AUTH END]************************************/

/****************************[VENDOR AUTH START]************************************/
Route::group(['middleware'=>['vendor']],function(){
    Route::get('/vendorsDasboard',[VendorController::class, 'vendorDashboard']);
   // Route::get('/ProfileSetting', [VendorController::class, 'ProfileSetting']);
    //Route::post('/profile_update', [VendorController::class, 'profile_update']);

    Route::any('/updateProfile', [VendorController::class, 'updateProfile']);

    Route::get('/vendorProduct',[VendorController::class, 'vendorProduct']);
    Route::post('/productStatus',[VendorController::class, 'productStatus']);
    Route::get('/deleteProduct/{id}',[VendorController::class, 'deleteProduct'])->name('deleteProduct');
    Route::any('/addProduct/{id?}',[VendorController::class, 'addProduct'])->name('addProduct');
    Route::post('/finalPrice',[VendorController::class, 'finalPrice']);


    // Tailor section =============================================================================================

    Route::any('/addCatalogue/{id?}',[VendorController::class, 'addCatalogue']);
    Route::get('/Catalogue',[VendorController::class, 'Catalogue']);
    Route::post('/catalogueStatus',[VendorController::class, 'catalogueStatus']);

	Route::any('/addDocument/{id?}',[VendorController::class, 'addDocument']);
    Route::get('/deleteDoc/{id}',[VendorController::class, 'deleteDoc'])->name('deleteDoc');
    

});
/****************************[VENDOR AUTH END]*************************************/
// ===================================================================================================

//admin login
Route::get('/admin', [AuthController::class, 'index']);
Route::post('/adminlogin', [AuthController::class, 'adminlogin'])->name('adminlogin');
Route::get('/adminLogout', [AuthController::class, 'adminLogout'])->name('adminLogout');







Route::group(['middleware'=>['web','checkAdmin']],function(){
    Route::get('/admin/dashboard', [AuthController::class, 'admindashboard'])->name('admindashboard');
    Route::get('/admin/customer-list', [ManagementController::class, 'customer_list'])->name('admin.customer_list');
    Route::get('/admin/customer-form', [ManagementController::class, 'customerForm'])->name('admin.customer_form');
    Route::post('/admin/customer_formAction', [ManagementController::class, 'customerFormAction'])->name('admin.customerFormAction');
    Route::post('/admin/customer-status', [ManagementController::class, 'customerStatus'])->name('admin.customerStatus');
    Route::get('/admin/delete-user-list/{id}', [ManagementController::class, 'delete_user_list'])->name('admin.delete_user_list');
    Route::get('/admin/customer-edit/{id}', [ManagementController::class, 'customer_edit'])->name('admin.customer_edit');
    Route::post('/admin/useremail', [ManagementController::class, 'checkEmailuser'])->name('admin.checkEmailuser');
    Route::get('/admin/customer-view/{id}', [ManagementController::class, 'customer_view'])->name('admin.customer_view');

    //vip customer
    Route::get('/admin/vip-customer-view/{id}', [ManagementController::class, 'vip_customer_view'])->name('admin.vip_customer_view');
    Route::get('/admin/vip-customer-list', [ManagementController::class, 'vip_customer_list'])->name('admin.vip_customer_list');
    Route::get('/admin/vip-customer-form', [ManagementController::class, 'vipCustomerForm'])->name('admin.vip_customer_form');
    Route::get('/admin/vip-customer-edit/{id}', [ManagementController::class, 'vipCustomeredit'])->name('admin.vip_customer_edit');
    Route::post('/admin/vipcustomer_formAction', [ManagementController::class, 'vipCustomerFormAction'])->name('admin.vipcustomerFormAction');

   //tailor management
   Route::get('/admin/tailor-list', [ManagementController::class, 'tailor_list'])->name('admin.tailor_list');
   Route::get('/admin/tailor-form', [ManagementController::class, 'tailorForm'])->name('admin.tailor_form');
   Route::post('/admin/tailorFormAction', [ManagementController::class, 'tailorFormAction'])->name('admin.tailorFormAction');
   Route::get('/admin/delete-vendor-list/{id}', [ManagementController::class, 'delete_vendor_list'])->name('admin.delete_vendor_list');
   Route::post('/admin/vendor-status', [ManagementController::class, 'vendorStatus'])->name('admin.vendorStatus');
   Route::post('/admin/vendor-filter', [ManagementController::class, 'vendorFilter'])->name('admin.vendorFilter');
   Route::get('/admin/tailor-view/{id}', [ManagementController::class, 'tailor_view'])->name('admin.tailor_view');
   Route::get('/admin/tailor-edit/{id}', [ManagementController::class, 'tailor_edit'])->name('admin.tailor_edit');


    //fabric seller management
    Route::get('/admin/fabric-seller-list', [ManagementController::class, 'fabric_seller_list'])->name('admin.fabric_seller_list');
    Route::get('/admin/fabric-seller-form', [ManagementController::class, 'fabric_seller_form'])->name('admin.fabric_seller_form');
    Route::post('/admin/fabricSellerAction', [ManagementController::class, 'fabricSellerAction'])->name('admin.fabricSellerAction');

    //tailor seller management
    Route::get('/admin/tailor-seller-list', [ManagementController::class, 'tailor_seller_list'])->name('admin.tailor_seller_list');
    Route::get('/admin/tailor-seller-form', [ManagementController::class, 'tailor_seller_form'])->name('admin.tailor_seller_form');
    Route::post('/admin/tailorSellerAction', [ManagementController::class, 'tailorSellerAction'])->name('admin.tailorSellerAction');


	/********************[Master Route ]*************************/
    Route::get('/admin/getSize', [MasterController::class, 'getSize'])->name('getSize');
    Route::any('/admin/addSize/{id?}', [MasterController::class, 'addSize'])->name('addSize');
    Route::post('/admin/changesizeStatus', [MasterController::class, 'changesizeStatus'])->name('changesizeStatus');
    Route::get('/admin/deleteSize/{id}', [MasterController::class, 'deleteSize'])->name('deleteSize');

    Route::get('/admin/getColor', [MasterController::class, 'getColor'])->name('getColor');
    Route::any('/admin/addColor/{id?}', [MasterController::class, 'addColor'])->name('addColor');
    Route::post('/admin/changeColorStatus', [MasterController::class, 'changeColorStatus'])->name('changeColorStatus');
    Route::get('/admin/deleteColor/{id}', [MasterController::class, 'deleteColor'])->name('deleteColor');

    Route::get('/admin/getSpeciality', [MasterController::class, 'getSpeciality'])->name('getSpeciality');
    Route::any('/admin/addSpeciality/{id?}', [MasterController::class, 'addSpeciality'])->name('addSpeciality');
    Route::post('/admin/changeSpecialityStatus', [MasterController::class, 'changeSpecialityStatus'])->name('changeSpecialityStatus');
    Route::get('/admin/deleteSpeciality/{id}', [MasterController::class, 'deleteSpeciality'])->name('deleteSpeciality');
	
	Route::get('/admin/getFebricType', [MasterController::class, 'getFebricType'])->name('getFebricType');
    Route::any('/admin/addFebricType/{id?}', [MasterController::class, 'addFebricType'])->name('addFebricType');
    Route::post('/admin/changeFebricTypeStatus', [MasterController::class, 'changeFebricTypeStatus'])->name('changeFebricTypeStatus');
    Route::get('/admin/deleteFebricType/{id}', [MasterController::class, 'deleteFebricType'])->name('deleteFebricType');

    Route::get('/admin/getPlans', [MasterController::class, 'getPlans'])->name('getPlans');
    Route::any('/admin/addPlan/{id?}', [MasterController::class, 'addPlan'])->name('addPlan');
    Route::post('/admin/changePlanStatus', [MasterController::class, 'changePlanStatus'])->name('changePlanStatus');
    Route::get('/admin/deletePlan/{id}', [MasterController::class, 'deletePlan'])->name('deletePlan');
	
	Route::get('/admin/getCategory', [MasterController::class, 'getCategory'])->name('getCategory');
    Route::any('/admin/addCategory/{id?}', [MasterController::class, 'addCategory'])->name('addCategory');
    Route::post('/admin/changeCategoryStatus', [MasterController::class, 'changeCategoryStatus'])->name('changeCategoryStatus');
    Route::get('/admin/deleteCategory/{id}', [MasterController::class, 'deleteCategory'])->name('deleteCategory');

    /********************[CMS Route ]*************************/
    Route::any('/admin/privacyPolicy', [CmsController::class, 'privacyPolicy'])->name('privacyPolicy');
    Route::any('/admin/aboutUs', [CmsController::class, 'aboutUs'])->name('aboutUs');
    Route::any('/admin/termsConditions', [CmsController::class, 'termsConditions'])->name('termsConditions');
	
	/********************[Vendor Document Route ]*************************/
    Route::any('/admin/listDocument', [CmsController::class, 'listDocument'])->name('listDocument');
    Route::get('/admin/deleteDocument/{id}', [CmsController::class, 'deleteDocument'])->name('deleteDocument');
    Route::post('/admin/documentStatus',[CmsController::class,'documentStatus'])->name('documentStatus');
});



// Vender===============================================================================




// =====================================================================================

//coutnr_detail_route
Route::get('/getcountry', [ManagementController::class, 'getcountry'])->name('show.getcountry');
Route::POST('/getstate ', [ManagementController::class, 'getstate']);
Route::POST('/getcity ', [ManagementController::class, 'getcity']);


