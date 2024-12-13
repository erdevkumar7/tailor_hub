<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Policy;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;
use Hash;


class CmsController extends Controller
{
    public function privacyPolicy(Request $request)
    {
        //This function is for add/update/show the privacy policy
        $privacy = Policy::where('policy_type', 3)->first();
        if ($request->isMethod('post')) 
        {
            
            $policy_content=$request->policy_content;
            if($privacy)
            {
                //Now update the privacy Policy
                DB::table('policy')
                  ->where('policy_type', 3)
                  ->update([
                  'policy_content' => $request->policy_content
              ]);

              Session::flash('message', 'Privacy Policy Updated Sucessfully!');
              return redirect()->to('/admin/privacyPolicy');
            }
            else
            {
                //add the privacy Policy
                $user = new Policy;
				
				$user->policy_content = $request->policy_content;
				$user->policy_type = "3";
				$user->is_active = "1";
				$user->created_at = date('Y-m-d H:i:s');
				$user->save();
				$user_id = $user->policy_id;
				Session::flash('message', 'Policy added Sucessfully!');
	
				return redirect()->to('/admin/privacyPolicy');
            }
        }
        return view('admin.cms.privacy_policy',compact('privacy'));
    }
    public function aboutUs(Request $request)
    {
        //This function is for add/update/show the privacy policy
        $about = Policy::where('policy_type', 2)->first();
        if ($request->isMethod('post')) 
        {
            
            $policy_content=$request->policy_content;
            if($about)
            {
                //Now update the privacy Policy
                DB::table('policy')
                  ->where('policy_type', 2)
                  ->update([
                  'policy_content' => $request->policy_content
              ]);

              Session::flash('message', 'About Us Updated Sucessfully!');
              return redirect()->to('/admin/aboutUs');
            }
            else
            {
                //add the privacy Policy
                $user = new Policy;
				
				$user->policy_content = $request->policy_content;
				$user->policy_type = "2";
				$user->is_active = "1";
				$user->created_at = date('Y-m-d H:i:s');
				$user->save();
				$user_id = $user->policy_id;
				Session::flash('message', 'About Us added Sucessfully!');
	
				return redirect()->to('/admin/aboutUs');
            }
        }
        return view('admin.cms.about_us',compact('about'));
    }
    public function termsConditions(Request $request)
    {
        //This function is for add/update/show the privacy policy
        $terms = Policy::where('policy_type', 1)->first();
        if ($request->isMethod('post')) 
        {
            
            $policy_content=$request->policy_content;
            if($terms)
            {
                //Now update the privacy Policy
                DB::table('policy')
                  ->where('policy_type', 1)
                  ->update([
                  'policy_content' => $request->policy_content
              ]);

              Session::flash('message', 'Terms & Conditions Updated Sucessfully!');
              return redirect()->to('/admin/termsConditions');
            }
            else
            {
                //add the privacy Policy
                $user = new Policy;
				
				$user->policy_content = $request->policy_content;
				$user->policy_type = "1";
				$user->is_active = "1";
				$user->created_at = date('Y-m-d H:i:s');
				$user->save();
				$user_id = $user->policy_id;
				Session::flash('message', 'Terms & Conditions added Sucessfully!');
	
				return redirect()->to('/admin/termsConditions');
            }
        }
        return view('admin.cms.terms_conditions',compact('terms'));
    }
    /**********************************[ VENDOR DOCUMENT START ]**********************************/
    public function listDocument()
    {
        //This function is for vendor document list
        $document = DB::table('documents')
						->join('vendors', 'documents.vendor_id', '=', 'vendors.vendor_id')
                        ->where('documents.is_deleted', '0')
						->select('documents.*', 'vendors.name','vendors.last_name','vendors.mobile_no')
                        ->orderBy('documents.id', 'desc')
						->get();

        return view('admin.cms.document_list',compact('document'));
    }
    public function deleteDocument($id)
    {
        $result = DB::table('documents')
            ->where('id', $id)
            ->update(['is_deleted' => 1]);

        if ($result > 0) {
            // Successfully updated at least one row
            Session::flash('message', 'Document deleted successfully!');
        } else {
            // No rows updated
            Session::flash('message', 'Failed to delete Document or already deleted.');
        }

        return redirect()->to('/admin/listDocument');
    }
    public function documentStatus(Request $request)
    {
        $result =  DB::table('documents')
                ->where('id', $request->id)
                ->update(
                    ['verification_status' => $request->status]
                );
        if ($result){
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else{
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        }
    }
    /**********************************[ VENDOR DOCUMENT END ]**********************************/
}