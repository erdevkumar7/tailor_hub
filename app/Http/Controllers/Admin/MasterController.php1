<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Size;
use App\Models\Color;
use App\Models\Speciality;
use App\Models\FebricType;
use App\Models\SubscriptionPlan;
use App\Models\Category;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;
use Hash;


class MasterController extends Controller
{
    /*******************[Size Master Start]************************/
    public function getSize()
    {
        //This function is for getting the size
        $size_list = Size::where('is_deleted','=','0')->orderBy('id', 'desc')->get();
        return view('admin.master.size_list',compact('size_list'));
    }
    public function addSize(Request $request , $id = null)
    {
        //This function is for add/update the size
        $size_detail='';
        if($id)
        {
            $size_detail = Size::where('id', $id)->first();
        }
        if ($request->isMethod('post')) {
            
            if($request->size_id)
            {
                //This section is for update the size
                $size = Size::where('size_name', $request->size_name)
                        ->where('is_deleted', 0) 
                        ->where('id','!=', $request->size_id) 
                        ->first();
                if($size)
                {
                    return back()->with([
                        'error' => 'This size is already exist',
                        'id' => $request->size_id,
                    ]);
                }  
                else
                {
                    DB::table('size_master')
                            ->where('id', $request->size_id)
                            ->update([
                            'size_name' => trim($request->size_name)
                        ]);
        
                        Session::flash('message', 'Size Updated Sucessfully!');
                        return redirect()->to('/admin/getSize');
                }      
            }
            else{
                //This section is for add size
                $size = Size::where('size_name', $request->size_name)
                    ->where('is_deleted', 0) 
                    ->first();
                if($size)
                {
                    return back()->with('error','This size is already exist');
                }    
                else
                {
                    $user               = new Size;
                    $user->size_name    = trim($request->size_name);
                    $user->is_active    = "1";
                    $user->is_deleted   = "0";
                    $user->save();
                    $user_id = $user->id;
                    Session::flash('message', 'Size added Sucessfully!');
        
                    return redirect()->to('/admin/getSize');
                }  
            }
              
        }
        return view('admin.master.add_size',compact('size_detail'));
    }
    public function changesizeStatus(Request $request)
    {
        //This function is for change the size status
        $result =  DB::table('size_master')
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
    public function deleteSize($id){
        
        $result =  DB::table('size_master')
                ->where('id', $id)
                ->update(
                    ['is_deleted' => 1]
                );
        if ($result){
            Session::flash('message', 'Size deleted Sucessfully!');
            return redirect()->to('/admin/getSize');
        } else{
            Session::flash('message', 'Failed to delete Size');
            return redirect()->to('/admin/getSize');
        }
   }
   /*******************[Size Master End]************************/

    /*******************[Color Master Start]************************/
    public function getColor()
    {
        //This function is for getting the size
        $color_list = Color::where('is_deleted','=','0')->orderBy('color_id', 'desc')->get();
        return view('admin.master.color_list',compact('color_list'));
    }
    public function addColor(Request $request , $id = null)
    {
        //This function is for add/update the size
        $color_detail='';
        if($id)
        {
            $color_detail = Color::where('color_id', $id)->first();
        }
        if ($request->isMethod('post')) {
            
            if($request->color_id)
            {
                //This section is for update the size
                $color = Color::where(function ($query) use ($request) {
                        $query->where('color_name', $request->color_name)
                            ->orWhere('color_code', $request->color_code);
                            })
                            ->where('is_deleted', 0)
                            ->where('color_id','!=', $request->color_id) 
                            ->first();

                    
                if($color)
                {
                    return back()->with([
                        'error' => 'This Color is already exist',
                        'id' => $request->color_id,
                    ]);
                }  
                else
                {
                    DB::table('color_master')
                            ->where('color_id', $request->color_id)
                            ->update([
                            'color_name' => trim($request->color_name),
                            'color_code' => trim($request->color_code)
                        ]);
        
                        Session::flash('message', 'Color Updated Sucessfully!');
                        return redirect()->to('/admin/getColor');
                }      
            }
            else{
                //This section is for add size
                $color = Color::where(function ($query) use ($request) {
                            $query->where('color_name', $request->color_name)
                                ->orWhere('color_code', $request->color_code);
                                })
                                ->where('is_deleted', 0)
                                ->first();
                if($color)
                {
                    return back()->with('error','This Color is already exist');
                }    
                else
                {
                    $user               = new Color;
                    $user->color_name    = trim($request->color_name);
                    $user->color_code    = trim($request->color_code);
                    $user->is_active    = "1";
                    $user->is_deleted   = "0";
                    $user->save();
                    $user_id = $user->color_id;
                    Session::flash('message', 'Color added Sucessfully!');
        
                    return redirect()->to('/admin/getColor');
                }  
            }
              
        }
        return view('admin.master.add_color',compact('color_detail'));
    }
    public function changeColorStatus(Request $request)
    {
        //This function is for change the size status
        $result =  DB::table('color_master')
                ->where('color_id', $request->id)
                ->update(
                    ['is_active' => $request->status]
                );
        if ($result){
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else{
            return response()->json(['success' => false, 'message' => 'Failed to update status']);
        }
    }
    public function deleteColor($id){
        
        $result =  DB::table('color_master')
                ->where('color_id', $id)
                ->update(
                    ['is_deleted' => 1]
                );
        if ($result){
            Session::flash('message', 'Color deleted Sucessfully!');
            return redirect()->to('/admin/getColor');
        } else{
            Session::flash('message', 'Failed to delete Color');
            return redirect()->to('/admin/getColor');
        }
   }
   /*******************[Color Master End]************************/

   /*******************[Speciality Master Start]************************/
   public function getSpeciality()
   {
       //This function is for getting the size
       $speciality_list = Speciality::where('is_deleted','=','0')->orderBy('speciality_id', 'desc')->get();
       return view('admin.master.speciality_list',compact('speciality_list'));
   }
   public function addSpeciality(Request $request , $id = null)
   {
       //This function is for add/update the size
       $speciality_detail='';
       if($id)
       {
           $speciality_detail = Speciality::where('speciality_id', $id)->first();
       }
       if ($request->isMethod('post')) {
           
           if($request->speciality_id)
           {
               //This section is for update the size
               $speciality = Speciality::where('speciality_name', $request->speciality_name)
                                    ->where('is_deleted', '0')
                                    ->where('speciality_id','!=', $request->speciality_id) 
                                    ->first();

                   
               if($speciality)
               {
                   return back()->with([
                       'error' => 'This speciality is already exist',
                       'id' => $request->speciality_id,
                   ]);
               }  
               else
               {
                   DB::table('speciality_master')
                           ->where('speciality_id', $request->speciality_id)
                           ->update([
                           'speciality_name' => trim($request->speciality_name)
                           
                       ]);
       
                       Session::flash('message', 'Speciality Updated Sucessfully!');
                       return redirect()->to('/admin/getSpeciality');
               }      
           }
           else{
               //This section is for add size
               $speciality = Speciality::where('speciality_name', $request->speciality_name)
                                    ->where('is_deleted', '0')
                                    ->first();
               if($speciality)
               {
                   return back()->with('error','This Speciality is already exist');
               }    
               else
               {
                   $user               = new Speciality;
                   $user->speciality_name    = trim($request->speciality_name);
                   $user->is_active    = "1";
                   $user->is_deleted   = "0";
                   $user->save();
                   $user_id = $user->speciality_id;
                   Session::flash('message', 'Color added Sucessfully!');
       
                   return redirect()->to('/admin/getSpeciality');
               }  
           }
             
       }
       return view('admin.master.add_speciality',compact('speciality_detail'));
   }
   public function changeSpecialityStatus(Request $request)
   {
       //This function is for change the size status
       $result =  DB::table('speciality_master')
               ->where('speciality_id', $request->id)
               ->update(
                   ['is_active' => $request->status]
               );
       if ($result){
           return response()->json(['success' => true, 'message' => 'Status updated successfully']);
       } else{
           return response()->json(['success' => false, 'message' => 'Failed to update status']);
       }
   }
   public function deleteSpeciality($id){
       
       $result =  DB::table('speciality_master')
               ->where('speciality_id', $id)
               ->update(
                   ['is_deleted' => 1]
               );
       if ($result){
           Session::flash('message', 'Speciality deleted Sucessfully!');
           return redirect()->to('/admin/getSpeciality');
       } else{
           Session::flash('message', 'Failed to delete Speciality');
           return redirect()->to('/admin/getSpeciality');
       }
  }
  /*******************[Speciality Master End]************************/

  /*******************[Febric Type  Master Start]************************/
  public function getFebricType()
  {
      //This function is for getting the size
      $febric_type_list = FebricType::where('is_deleted','=','0')->orderBy('febric_type_id', 'desc')->get();
      return view('admin.master.febric_type_list',compact('febric_type_list'));
  }
  public function addFebricType(Request $request , $id = null)
  {
      //This function is for add/update the size
      $febric_type_detail='';
      if($id)
      {
          $febric_type_detail = FebricType::where('febric_type_id', $id)->first();
      }
      if ($request->isMethod('post')) {
          
          if($request->febric_type_id)
          {
              //This section is for update the size
              $febric = FebricType::where('febric_type_name', $request->febric_type_name)
                                   ->where('is_deleted', '0')
                                   ->where('febric_type_id','!=', $request->febric_type_id) 
                                   ->first();

                  
              if($febric)
              {
                  return back()->with([
                      'error' => 'This Febric Type is already exist',
                      'id' => $request->febric_type_id,
                  ]);
              }  
              else
              {
                  DB::table('febric_type_master')
                          ->where('febric_type_id', $request->febric_type_id)
                          ->update([
                          'febric_type_name' => trim($request->febric_type_name)
                          
                      ]);
      
                      Session::flash('message', 'Febric Type Updated Sucessfully!');
                      return redirect()->to('/admin/getFebricType');
              }      
          }
          else{
              //This section is for add size
              $febric = FebricType::where('febric_type_name', $request->febric_type_name)
                                   ->where('is_deleted', '0')
                                   ->first();
              if($febric)
              {
                  return back()->with('error','This Febric Type is already exist');
              }    
              else
              {
                  $user               = new FebricType;
                  $user->febric_type_name    = trim($request->febric_type_name);
                  $user->is_active    = "1";
                  $user->is_deleted   = "0";
                  $user->save();
                  $user_id = $user->febric_type_id;
                  Session::flash('message', 'Febric Type added Sucessfully!');
      
                  return redirect()->to('/admin/getFebricType');
              }  
          }
            
      }
      return view('admin.master.add_febric_type',compact('febric_type_detail'));
  }
  public function changeFebricTypeStatus(Request $request)
  {
      //This function is for change the size status
      $result =  DB::table('febric_type_master')
              ->where('febric_type_id', $request->id)
              ->update(
                  ['is_active' => $request->status]
              );
      if ($result){
          return response()->json(['success' => true, 'message' => 'Status updated successfully']);
      } else{
          return response()->json(['success' => false, 'message' => 'Failed to update status']);
      }
  }
  public function deleteFebricType($id){
      
      $result =  DB::table('febric_type_master')
              ->where('febric_type_id', $id)
              ->update(
                  ['is_deleted' => 1]
              );
      if ($result){
          Session::flash('message', 'Febric Type deleted Sucessfully!');
          return redirect()->to('/admin/getFebricType');
      } else{
          Session::flash('message', 'Failed to delete Febric Type');
          return redirect()->to('/admin/getFebricType');
      }
 }
 /*******************[Febric Type Master End]************************/

 /*******************[Subscription Plan Master Start]************************/
 public function getPlans()
 {
     //This function is for getting the size
     $plan_list = SubscriptionPlan::where('is_deleted','=','0')->orderBy('plan_id', 'desc')->get();
     return view('admin.master.plan_list',compact('plan_list'));
 }
 public function addPlan(Request $request , $id = null)
 {
     //This function is for add/update the size
     $plan_detail='';
     if($id)
     {
         $plan_detail = SubscriptionPlan::where('plan_id', $id)->first();
     }
     if ($request->isMethod('post')) {
         
         if($request->plan_id)
         {
             //This section is for update the size
             $febric = SubscriptionPlan::where('plan_name', $request->plan_name)
                                  ->where('is_deleted', '0')
                                  ->where('plan_id','!=', $request->plan_id) 
                                  ->first();

                 
             if($febric)
             {
                 return back()->with([
                     'error' => 'This Subscription plan is already exist',
                     'id' => $request->plan_id,
                 ]);
             }  
             else
             {
                 DB::table('sub_plans')
                         ->where('plan_id', $request->plan_id)
                         ->update([
                         'plan_name' => trim($request->plan_name),
                         'plan_html' => $request->plan_html,
                         'plan_amount' => $request->plan_amount
                         
                     ]);
     
                     Session::flash('message', 'Subscription Plan Updated Sucessfully!');
                     return redirect()->to('/admin/getPlans');
             }      
         }
         else{
             //This section is for add size
             $febric = SubscriptionPlan::where('plan_name', $request->plan_name)
                                  ->where('is_deleted', '0')
                                  ->first();
             if($febric)
             {
                 return back()->with('error','This Subscription Plan is already exist');
             }    
             else
             {
                 $user               = new SubscriptionPlan;
                 $user->plan_name    = trim($request->plan_name);
                 $user->plan_html    = $request->plan_html;
                 $user->plan_amount    = $request->plan_amount;
                 $user->is_active    = "1";
                 $user->is_deleted   = "0";
                 $user->save();
                 $user_id = $user->plan_id;
                 Session::flash('message', 'Subscription Plan added Sucessfully!');
     
                 return redirect()->to('/admin/getPlans');
             }  
         }
           
     }
     return view('admin.master.add_plan',compact('plan_detail'));
 }
 public function changePlanStatus(Request $request)
 {
     //This function is for change the size status
     $result =  DB::table('sub_plans')
             ->where('plan_id', $request->id)
             ->update(
                 ['is_active' => $request->status]
             );
     if ($result){
         return response()->json(['success' => true, 'message' => 'Status updated successfully']);
     } else{
         return response()->json(['success' => false, 'message' => 'Failed to update status']);
     }
 }
 public function deletePlan($id){
     
     $result =  DB::table('sub_plans')
             ->where('plan_id', $id)
             ->update(
                 ['is_deleted' => 1]
             );
     if ($result){
         Session::flash('message', 'Subscription Plan deleted Sucessfully!');
         return redirect()->to('/admin/getPlans');
     } else{
         Session::flash('message', 'Failed to delete Subscription');
         return redirect()->to('/admin/getPlans');
     }
}
/*******************[Subscription Plan Master End]************************/
 
 /*******************[Category Master Start]************************/
 public function getCategory()
 {
     //This function is for getting the size
     $cat_list = Category::where('is_deleted','=','0')->orderBy('category_id', 'desc')->get();
     return view('admin.master.category_list',compact('cat_list'));
 }
 public function addCategory(Request $request , $id = null)
 {
     //This function is for add/update the size
     $cate_detail='';
     if($id)
     {
         $cate_detail = Category::where('category_id', $id)->first();
     }
     if ($request->isMethod('post')) {
         
         if($request->category_id)
         {
             //This section is for update the size
             $febric = Category::where('category_name', $request->category_name)
                                  ->where('is_deleted', '0')
                                  ->where('category_id','!=', $request->category_id) 
                                  ->first();

                 
             if($febric)
             {
                 return back()->with([
                     'error' => 'This Category is already exist',
                     'id' => $request->category_id,
                 ]);
             }  
             else
             {
                 DB::table('category')
                         ->where('category_id', $request->category_id)
                         ->update([
                         'category_name' => trim($request->category_name),
                         
                         
                     ]);
     
                     Session::flash('message', 'Category Updated Sucessfully!');
                     return redirect()->to('/admin/getCategory');
             }      
         }
         else{
             //This section is for add size
             $febric = Category::where('category_name', $request->category_name)
                                  ->where('is_deleted', '0')
                                  ->first();
             if($febric)
             {
                 return back()->with('error','This Category is already exist');
             }    
             else
             {
                 $user               = new Category;
                 $user->category_name    = trim($request->category_name);
                 $user->is_active    = "1";
                 $user->is_deleted   = "0";
                 $user->save();
                 $user_id = $user->category_id;
                 Session::flash('message', 'Category added Sucessfully!');
     
                 return redirect()->to('/admin/getCategory');
             }  
         }
           
     }
     return view('admin.master.add_category',compact('cate_detail'));
 }
 public function changeCategoryStatus(Request $request)
 {
     //This function is for change the size status
     $result =  DB::table('category')
             ->where('category_id', $request->id)
             ->update(
                 ['is_active' => $request->status]
             );
     if ($result){
         return response()->json(['success' => true, 'message' => 'Status updated successfully']);
     } else{
         return response()->json(['success' => false, 'message' => 'Failed to update status']);
     }
 }
 public function deleteCategory($id){
     
     $result =  DB::table('category')
             ->where('category_id', $id)
             ->update(
                 ['is_deleted' => 1]
             );
     if ($result){
         Session::flash('message', 'Category deleted Sucessfully!');
         return redirect()->to('/admin/getCategory');
     } else{
         Session::flash('message', 'Failed to delete Category');
         return redirect()->to('/admin/getCategory');
     }
}
/*******************[Category Master End]************************/
}