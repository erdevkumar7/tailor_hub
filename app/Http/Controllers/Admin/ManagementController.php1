<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;
use Hash;


class ManagementController extends Controller
{

    public function customer_list(){
        // $user_list = User::all();
        // echo "<pre>"; print_r($user_list);die;
        $user_list = User::where('customer_type','=','0')->orderBy('id', 'desc')->get();
        return view('admin.user_mgmt.customer_list',compact('user_list'));
        // return view('admin.user_mgmt.customer_list');
    }

    public function customerForm(){
        // echo "test";die;
        $country = DB::table('master_country')->where('country_id','=','161')->select('country_id','country_name')->get();
        return view('admin.user_mgmt.customer_form',compact('country'));
      }

      public function customerFormAction(Request $request)
      {
        //  echo "<pre>"; print_r($request->all());die;
          // dd($request);
          $city = DB::table('master_city')->where('city_id',$request->city_id)->first();
          $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',

            'mobile_number' => 'required|string',
            'address' => 'nullable|string',
        ]);

          $request->all();
          $id = $request->id;
          if($id==0){
            // echo "test";die;
                if ($request->hasFile('profile_image')) {
                  $image = $request->file('profile_image');
                  $imageName = "cus".time().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('/admin/uploads/user'), $imageName);
              }
            //   $user = Auth::guard("customer")->user();
              $user = new User;
              $user->first_name = trim($request->first_name);
              $user->last_name = trim($request->last_name);
              $user->email_id = $request->email_id;
              $user->profile_image = $imageName;
              $user->gender = $request->gender;
              $user->mobile_number = $request->mobile_number;
              $user->password = Hash::make($request->password);
              $user->address = $request->user_address;
              $user->city_id = $request->city_id;
              $user->state_id = $request->state_id;
              $user->zipcode = $request->user_zipcode;
              $user->country_id = $request->country_id;
              $user->latitude = $city->latitude;
              $user->longitude = $city->longitude;
              $user->user_status = "1";
              $user->customer_type = "0";
              $user->is_social= "0";
              $user->is_deleted= "0";
              $user->save();
              $user_id = $user->id;
              Session::flash('message', 'User Inserted Sucessfully!');

              return redirect()->to('/admin/customer-list');

          }
          else{
            // echo "test";die;
            // print_r($request->all());die;

            $user = User::find($id);

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
                  'first_name' => trim($request->first_name),
                  'last_name' => trim($request->last_name),
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

                //   'photo'=> $imageName,
                //   'description'  => trim($request->description),
              ]);

              Session::flash('message', 'User Updated Sucessfully!');
              return redirect()->to('/admin/customer-list');
          }
      }

      public function customerStatus(Request $request){

        // print_r($request->all());die;
        $result =  DB::table('users')
                ->where('id', $request->id)
                ->update(
                    ['user_status' => $request->status]
                );
        if ($result){
            return response()->json(['success' => true, 'message' => 'Status updated     successfully']);
        } else{
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        }
    }

      public function delete_user_list($id){
        // $id = base64_decode($id);
       //  print_r($id);die;
            $user = User::find($id);
            $user->delete();
            // $course = DigitalMedias::find($id);
            if ($user) {
               //  session()->flash('success','User Delete successfully');
                Session::flash('message', 'User Deleted Successfully!');
            } else {
                Session::flash('error', 'User not found or could not be deleted!');
            }
            // return Redirect('admin/customer-list');
            return redirect()->back();
   }

   public function customer_edit($id = ""){
    //  print_r($id);die;
    $user_detail = User::find($id);
    // echo "<pre>";print_r($user_detail);die;
    $countries = DB::table('master_country')->select('country_id','country_name')->where('country_id',$user_detail->country_id)->get();
    $state = DB::table('master_state')->select('state_id','state_name')->where('state_id',$user_detail->state_id)->get();
    $city = DB::table('master_city')->select('city_id','city_name')->where('city_id',$user_detail->city_id)->get();
    // print_r($countries);die;
    return view('admin.user_mgmt.customer_edit',compact('user_detail','countries','state','city'));

}


public function getstate(Request $request) {
    $state = DB::table('master_state')->where('state_country_id', '=', $request->country_id)->orderBY('state_name', 'asc')->get();
    $data = compact('state');
    return response()->json($data);
}

public function getcity(Request $request) {
    $city = DB::table('master_city')->where('city_state_id', '=', $request->state_id)->orderBY('city_name', 'asc')->get();
    $data = compact('city');
    return response()->json($data);
}

   public function customer_view($id = ""){
    //  print_r($id);die;
    $user_detail = User::find($id);
    // echo "<pre>";print_r($user_detail);die;

    $countries = DB::table('master_country')->select('country_id','country_name')->where('country_id',$user_detail->country_id)->first();
    $state = DB::table('master_state')->select('state_id','state_name')->where('state_id',$user_detail->state_id)->first();
    $city = DB::table('master_city')->select('city_id','city_name')->where('city_id',$user_detail->city_id)->first();
    return view('admin.user_mgmt.customer_view',compact('user_detail','countries','state','city'));

}

public function checkEmailuser(Request $request) {
    $email = $request->input('email_id');

    // Check if email exists in either the User or Vendor table
    $userExists = User::where('email_id', $email)->exists();
    $vendorExists = Vendor::where('email', $email)->exists();

    if ($userExists || $vendorExists) {
        return response()->json(false); // Email is already taken
    } else {
        return response()->json(true); // Email is available
    }
}


public function vip_customer_list(){
    $user_list = User::where('customer_type','=','1')->orderBy('id', 'desc')->get();
    // echo "<pre>"; print_r($user_list);die;

    return view('admin.user_mgmt.vip_customer_list',compact('user_list'));
    // return view('admin.user_mgmt.customer_list');
}

public function vipCustomerForm(){
    // echo "test";die;
    $country = DB::table('master_country')->where('country_id','=','161')->select('country_id','country_name')->get();
    return view('admin.user_mgmt.vip_customer_form',compact('country'));
  }


  public function vipCustomerFormAction(Request $request)
  {
    //   print_r($request->all());die;
      // dd($request);

      $city = DB::table('master_city')->where('city_id',$request->city_id)->first();
    //   print_r($city);die;
      $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',

        'mobile_number' => 'required|string',
        'user_address' => 'nullable|string',
    ]);

      $request->all();
      $id = $request->id;
      if($id==0){
        // echo "test";die;
            if ($request->hasFile('profile_image')) {
              $image = $request->file('profile_image');
              $imageName = "cus".time().'.'.$image->getClientOriginalExtension();
              $image->move(public_path('/admin/uploads/user'), $imageName);
          }
        //   $user = Auth::guard("customer")->user();
          $user = new User;
          $user->first_name = trim($request->first_name);
          $user->last_name = trim($request->last_name);
          $user->email_id = $request->email_id;
          $user->profile_image = $imageName;
          $user->gender = $request->gender;
          $user->mobile_number = $request->mobile_number;
          $user->password = Hash::make($request->password);
          $user->address = $request->user_address;
          $user->city_id = $request->city_id;
          $user->state_id = $request->state_id;
          $user->zipcode = $request->user_zipcode;
          $user->country_id = $request->country_id;
          $user->latitude = $city->latitude;
          $user->longitude = $city->longitude;
          $user->user_status = "1";
          $user->customer_type = "1";
          $user->is_social= "0";
          $user->is_deleted= "0";
          $user->save();
          $user_id = $user->id;
          Session::flash('message', 'User Inserted Sucessfully!');

          return redirect()->to('/admin/vip-customer-list');

      }
      else{
        // echo "test";die;

        $user = User::find($id);

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
                'first_name' => trim($request->first_name),
                'last_name' => trim($request->last_name),
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
          ]);

          Session::flash('message', 'User Updated Sucessfully!');
          return redirect()->to('/admin/vip-customer-list');
      }
  }

  public function vip_customer_view($id = ""){
    //  print_r($id);die;
    $user_detail = User::find($id);
    // echo "<pre>";print_r($user_detail);die;

    $countries = DB::table('master_country')->select('country_id','country_name')->where('country_id',$user_detail->country_id)->first();
    $state = DB::table('master_state')->select('state_id','state_name')->where('state_id',$user_detail->state_id)->first();
    $city = DB::table('master_city')->select('city_id','city_name')->where('city_id',$user_detail->city_id)->first();
    return view('admin.user_mgmt.vip_customer_view',compact('user_detail','countries','state','city'));

}

public function vipCustomeredit ($id = ""){
    //  print_r($id);die;
    $user_detail = User::find($id);
    // echo "<pre>";print_r($user_detail);die;
    $countries = DB::table('master_country')->select('country_id','country_name')->where('country_id',$user_detail->country_id)->get();
    $state = DB::table('master_state')->select('state_id','state_name')->where('state_id',$user_detail->state_id)->get();
    $city = DB::table('master_city')->select('city_id','city_name')->where('city_id',$user_detail->city_id)->get();
    // print_r($countries);die;
    return view('admin.user_mgmt.vip_customer_edit',compact('user_detail','countries','state','city'));

}


public function tailor_list(){
    // $user_list = User::all();
    // echo "<pre>"; print_r($user_list);die;
    $user_list = Vendor::orderBy('vendor_id', 'desc')->get();
    return view('admin.vendor.tailor_list',compact('user_list'));
    // return view('admin.user_mgmt.customer_list');
}

public function tailorForm(){
    // echo "test";die;
    $country = DB::table('master_country')->where('country_id','=','161')->select('country_id','country_name')->get();
    return view('admin.vendor.tailor_form',compact('country'));
  }

  public function tailorFormAction(Request $request)
  {
    //  echo "<pre>";  print_r($request->all());die;
      // dd($request);

      $city = DB::table('master_city')->where('city_id',$request->city_id)->first();
    //   print_r($city);die;
      $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',

        'mobile_number' => 'required|string',
        'user_address' => 'nullable|string',
    ]);

      $request->all();
      $id = $request->id;
      if($id==0){
        // echo "test";die;
            if ($request->hasFile('profile_image')) {
              $image = $request->file('profile_image');
              $imageName = "cus".time().'.'.$image->getClientOriginalExtension();
              $image->move(public_path('/admin/uploads/user'), $imageName);
          }
        //   $user = Auth::guard("customer")->user();
          $vendor = new Vendor;
          $vendor->name = trim($request->first_name);
          $vendor->last_name = trim($request->last_name);
          $vendor->business_name = trim($request->business_name);
          $vendor->email = $request->email_id;
          $vendor->profile_img = $imageName;
        //   $vendor->gender = $request->gender;
          $vendor->mobile_no = $request->mobile_number;
          $vendor->password = Hash::make($request->password);
          $vendor->address = $request->user_address;
          $vendor->city_id = $request->city_id;
          $vendor->state_id = $request->state_id;
          $vendor->zip_code = $request->user_zipcode;
          $vendor->country_id = $request->country_id;
          $vendor->latitude = $city->latitude;
          $vendor->longitude = $city->longitude;
          $vendor->app_status = "1";
          $vendor->vendor_status = "1";
          $vendor->vendor_type = "1";
          $vendor->vip_type = "0";
          $vendor->is_social= "0";
          $vendor->is_deleted= "0";
          $vendor->save();
          $vendor_id = $vendor->id;
          Session::flash('message', 'Vendor Inserted Sucessfully!');

          return redirect()->to('/admin/tailor-list');

      }
      else{
        // echo "test";die;

        $user = User::find($id);

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
                'first_name' => trim($request->first_name),
                'last_name' => trim($request->last_name),
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
          ]);

          Session::flash('message', 'User Updated Sucessfully!');
          return redirect()->to('/admin/vip-customer-list');
      }
  }

  public function vendorStatus(Request $request){

    // print_r($request->all());die;
    $result =  DB::table('vendors')
            ->where('vendor_id', $request->id)
            ->update(
                ['vendor_status' => $request->status]
            );
    if ($result){
        return response()->json(['success' => true, 'message' => 'Status updated     successfully']);
    } else{
        return response()->json(['success' => false, 'message' => 'Failed to update status']);
    }
}

public function vendorFilter(Request $request) {

    $user_list = Vendor::orderBy('vendor_id', 'desc')->get();
    $query = Vendor::query();

    if ($request->customer_type) {
        $query->where('vip_type', $request->customer_type == 1 ? 0 : 1);
    }

    if ($request->account_status) {
        $query->where('vendor_status', $request->account_status == 1 ? 'suspended' : 'approved');
    }

    $filteredVendors = $query->get();

    return view('admin.vendor.tailor_filter', compact('filteredVendors','user_list'));
}




//Old project data
    public function user_list(){
        // $user_list = User::all();
        $user_list = User::orderBy('id', 'desc')->get();
    //    echo "<pre>"; print_r($user);die;
        return view('admin.student_mgmt.student_list',compact('user_list'));
    }



    public function user_editaction(Request $request)
{
    // print_r($request->all());die;

    $adduser = User::find($request->sid);
    // print_r($adduser);die;
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);


    $adduser->name = $request->name;
    $adduser->last_name = $request->last_name;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('assets/images/user'), $imageName);
        $adduser->profile_image = $imageName;
    }

    $adduser->email = $request->email;
    $adduser->country_of_study = $request->country_of_study;
    $adduser->institution = $request->institution;
    $adduser->education = $request->education;
    $adduser->academic_year = $request->academic_year;
    $adduser->dob = $request->dob;
    $adduser->title_shop = $request->title_shop;
    $adduser->description_store = $request->description_store;
    $adduser->status = "1";

    $adduser->save();

    // Redirect to the user list page
    return redirect('/admin/user-list')->with('success',"Student Profile has been updated successfully");
}


  public function studentview($id){

    $user_detail = User::find($id);

    return view('admin.student_mgmt.student_view',compact('user_detail'));
 }



   public function studyMaterial(){

    // $user_list = User::all();
    $user_list = User::orderBy('id', 'desc')->get();
    //    echo "<pre>"; print_r($user);die;
        // return view('admin.student_mgmt.student_list',compact('user_list'));
      return view('admin.document_mgmt.student_list_material',compact('user_list'));
   }

   public function documentList($id){
    //  print_r($request->all());die;

    // $user_list = User::all();
    $document_list = DocumentProd::orderBy('id', 'desc')->where('user_id',$id)->get();

      return view('admin.document_mgmt.document_list',compact('document_list','id'));
   }
   public function addDocument(Request $request){
       $id = $request->id;
    //    echo $id;die;
      return view('admin.document_mgmt.add_document');
   }
   public function addDocumentAction(Request $request)
   {
       // Validate the request
       $request->validate([
           'title' => 'required|string|max:255',
           'language' => 'required|string|max:255',
           'main_document' => 'required|mimes:pdf|max:10000',
           'preview_document' => 'nullable|mimes:pdf|max:5000',
           'price' => 'required|numeric',
           'kayword' => 'required|string|max:255',
           'description_store' => 'required|string',
       ]);

       // Handle file uploads
       if ($request->hasFile('main_document')) {
           $mainDocument = $request->file('main_document');
           $mainDocumentName = time() . '_' . $mainDocument->getClientOriginalName();
           $mainDocumentPath = $mainDocument->storeAs('documents', $mainDocumentName, 'public');

           // Generate preview document if not provided
           if ($request->hasFile('preview_document')) {
               $previewDocument = $request->file('preview_document');
               $previewDocumentName = time() . '_preview_' . $previewDocument->getClientOriginalName();
               $previewDocumentPath = $previewDocument->storeAs('documents/previews', $previewDocumentName, 'public');
           } else {
               // Logic to generate preview PDF from the first 3 pages of the main document
               $previewDocumentName = time() . '_preview_' . $mainDocument->getClientOriginalName();
               $previewDocumentPath = 'documents/previews/' . $previewDocumentName;

               // Use a package like `fpdi` to extract the first 3 pages
               $pdf = new \setasign\Fpdi\Fpdi();
               $pageCount = $pdf->setSourceFile(storage_path('app/public/' . $mainDocumentPath));

               $pdf->AddPage();
               for ($i = 1; $i <= min(3, $pageCount); $i++) {
                   $templateId = $pdf->importPage($i);
                   $pdf->useTemplate($templateId, 10, 10, 200);

                   if ($i < 3) {
                       $pdf->AddPage();
                   }
               }

               $pdf->Output(storage_path('app/public/' . $previewDocumentPath), 'F');
           }
       }

       // Save document information to the database
       $document = new DocumentProd();
       $document->title = $request->title;
       $document->language = $request->language;
       $document->main_document = $mainDocumentPath;
       $document->preview_document = $previewDocumentPath;
       $document->price = $request->price;
       $document->kayword = $request->kayword;
       $document->description_store = $request->description_store;
       $document->save();

       return redirect()->route('admin.documentList')->with('success', 'Document added successfully!');
   }

}
