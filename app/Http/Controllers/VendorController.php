<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Product;
use App\Models\FebricType;
use App\Models\ProductImage;
use App\Models\Catalogue;
use App\Models\ProductVariant;
use App\Models\Tailorspecialitys;
use App\Models\CatalogueImages;
use App\Models\Documents;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
	public function vendorDashboard()
	{
		//This function is for vendor dashboard
		if (Auth::guard('vendor')->check()) {
			// Redirect to the user dashboard if authenticated
			return view("front.vendor.vendor_dash");
		} else {
			return redirect()->to('/login');
		}
	}
	public function updateProfile(Request $request)
	{
		//This function is for update vendor profile
		$vendor = Vendor::where('vendor_id', auth('vendor')->id())->first();
		$countries = DB::table('master_country')->select('country_id', 'country_name')->where('country_status', 1)->get();
		$state = DB::table('master_state')->select('state_id', 'state_name')->where('state_country_id', $vendor->country_id)->get();
		$city = DB::table('master_city')->select('city_id', 'city_name')->where('city_state_id', $vendor->state_id)->get();

		$speciality = DB::table('speciality_master')->select('speciality_id as id', 'speciality_name as text')->where('is_deleted', 0)->where('is_active', 1)->get();

		$selected = DB::table('tailor_specialitys') // Replace with your pivot or related table
			->where('vendor_id', auth('vendor')->id())
			->pluck('speciality_id') // Get only the IDs
			->toArray();

		if ($request->isMethod('post')) {

			$name           = $request->name;
			$last_name		= $request->last_name;
			$email          = $request->email;
			$gender         = $request->gender;
			$img            = $request->img;
			$address        = $request->address;
			$country_id     = $request->country_id;
			$state_id       = $request->state_id;
			$city_id        = $request->city_id;
			$business_name  = $request->business_name;
			$zipcode        = $request->zipcode;
			$vendor_type	= $request->vendor_type;

			$experience        	= $request->experience;
			$short_description  = $request->short_description;
			$long_description   = $request->long_description;
			$selected_ids       = $request->selected_ids;


			if ($img) {
				$imageName = time() . '.' . $request->img->extension();
				$request->img->move(public_path('upload'), $imageName);
			} else {
				$imageName = $request->old_image;
			}

			$vendorId = Auth::guard('vendor')->user()->vendor_id;

			$vendor = Vendor::where('vendor_id', $vendorId)->first();
			$vendor->name                   = $name;
			$vendor->last_name              = $last_name;
			$vendor->email                  = $email;
			$vendor->profile_img            = $imageName;
			$vendor->address                = $address;
			$vendor->business_name          = $business_name;
			$vendor->country_id             = $country_id;
			$vendor->state_id               = $state_id;
			$vendor->city_id                = $city_id;
			$vendor->zip_code               = $zipcode;
			$vendor->short_description      = $short_description;
			$vendor->long_description       = $long_description;
			$vendor->experience             = $experience;
			$vendor->vendor_type			= $vendor_type;
			$vendor->save();

			//now update the speciality
			if (count($selected_ids) > 0) {
				DB::table('tailor_specialitys')->where('vendor_id', $vendorId)->delete();

				//now save new speciality

				foreach ($selected_ids as $ids) {
					$spec = new Tailorspecialitys;
					$spec->speciality_id = $ids;
					$spec->vendor_id = $vendorId;
					$spec->save();
				}
			}
			Session::flash('message', 'Profile Update Sucessfully!');
			return redirect()->to('/updateProfile');
		}
		return view("front.vendor.tailor_profile", compact('vendor', 'countries', 'state', 'city', 'speciality', 'selected'));
	}
	/*
    public function ProfileSetting(Request $request)
	{
		$vendorId = Auth::guard('vendor')->user()->vendor_id;
        $data['vendor'] = Vendor::where('vendor_id', $vendorId)->first();
        $data['countries'] = DB::table('master_country')->select('country_id','country_name')->where('country_status',1)->get();
        $data['state']     = DB::table('master_state')->select('state_id','state_name')->where('state_country_id',1)->get();
        $data['city']      = DB::table('master_city')->select('city_id','city_name')->where('city_state_id',1)->get();
		return view("front.vendor.tailor_profile",$data);
	}

	public function profile_update(Request $request)
	{
        $name           = $request->name;
        $email          = $request->email;
        $gender         = $request->gender;
        $img            = $request->img;
        $address        = $request->address;
        $country_id     = $request->country_id;
        $state_id       = $request->state_id;
        $city_id        = $request->city_id;
        $business_name  = $request->business_name;
        $zipcode        = $request->zipcode;


        if($img){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('upload'), $imageName);
        }else{
            $imageName = $request->old_image;
        }

        $vendorId = Auth::guard('vendor')->user()->vendor_id;

        $vendor = Vendor::where('vendor_id', $vendorId)->first();
        $vendor->name                   = $name;
        $vendor->email                  = $email;
        $vendor->profile_img            = $imageName;
        $vendor->address                = $address;
        $vendor->business_name          = $business_name;
        $vendor->country_id             = $country_id;
        $vendor->state_id               = $state_id;
        $vendor->city_id                = $city_id;
        $vendor->zip_code               = $zipcode;
        $vendor->save();

        Session::flash('message', 'Profile Update Sucessfully!');
        return redirect()->to('/ProfileSetting');

    }*/
	public function vendorProduct()
	{
		//This function is for vendor product list
		$products = DB::table('products')
			->join('category', 'products.category_id', '=', 'category.category_id')
			->where('products.vendor_id', auth('vendor')->id())
			->where('products.is_deleted', '0')
			->select('products.*', 'category.category_name as category_name')
			->get();
		return view("front/vendor/product_list", compact('products'));
	}

	public function productStatus(Request $request)
	{
		if ($request->type == 'availability') {
			$result =  DB::table('products')
				->where('id', $request->id)
				->update(
					['is_available' => $request->status]
				);
			if ($result) {
				return response()->json(['success' => true, 'message' => 'Availability updated successfully']);
			} else {
				return response()->json(['success' => false, 'message' => 'Failed to update Availability']);
			}
		}
		if ($request->type == 'is_active') {
			$result =  DB::table('products')
				->where('id', $request->id)
				->update(
					['is_active' => $request->status]
				);
			if ($result) {
				return response()->json(['success' => true, 'message' => 'Status updated successfully']);
			} else {
				return response()->json(['success' => false, 'message' => 'Failed to update status']);
			}
		}
	}
	public function deleteProduct($id)
	{

		$result = DB::table('products')
			->where('id', $id)
			->update(['is_deleted' => 1]);

		if ($result > 0) {
			// Successfully updated at least one row
			Session::flash('message', 'Product deleted successfully!');
		} else {
			// No rows updated
			Session::flash('message', 'Failed to delete product or already deleted.');
		}

		return redirect()->to('/vendorProduct');
	}
	public function addProduct(Request $request, $id = null)
	{
		//This function is for add product
		$category           = $request->category_id;
		$product_name       = $request->name;
		$product_image	= $request->product_image;
		$old_product_image = $request->old_product_image;
		$fab_type			= $request->fab_type;
		$galary_img         = $request->galary_img;
		$old_image          = $request->old_image;
		$product_type       = $request->product_type;
		$fabric_type        = $request->fabric_type;
		$gender_type        = $request->gender_type;
		$product_details    = $request->product_detail;
		$price   			= $request->price;
		$discount			= $request->discount;
		$finalPrice			= $request->finalPrice;
		$sizes              = $request->sizes;
		$vendor_id			= auth('vendor')->id();



		$data['product'] = '';
		if ($id) {
			$data['product'] = Product::where('id', $id)->first();
			$data['productImages'] = ProductImage::where('product_id', $id)->get();
			$data['ProductVariants'] = ProductVariant::where('product_id', $id)->get()->groupBy('size_id');
		}
		if ($request->isMethod('post')) {
			if ($request->product_id) {

				if ($product_image) {
					$imageName = uniqid() . '.' . $product_image->extension();
					$product_image->move(public_path('Productupload'), $imageName);
				} else {
					$imageName = $old_product_image;
				}

				$productUpdate = Product::where('id', $request->product_id)->first();
				$productUpdate->category_id     = $category;
				$productUpdate->product_name    = $product_name;
				$productUpdate->product_details = $product_details;
				$productUpdate->product_image	= $imageName;
				$productUpdate->product_type    = $product_type;
				$productUpdate->gender_type     = $gender_type;
				$productUpdate->febric_type_id  = $fab_type;
				$productUpdate->product_price	= $price;
				$productUpdate->discount		= $discount;
				$productUpdate->final_price 	= $finalPrice;
				$productUpdate->is_available    = '1';
				$productUpdate->is_available    = '1';
				$productUpdate->is_deleted      = '0';
				$productUpdate->vendor_id 		= $vendor_id;
				$productUpdate->save();

				// //Galary image Update code =========================================================================================

				ProductImage::where('product_id', $request->product_id)->delete();
				if ($galary_img) {
					foreach ($galary_img  as $img) {
						$imageName = uniqid() . '.' . $img->extension();
						$img->move(public_path('Productupload'), $imageName);
						$newProduct_images                  = new ProductImage();
						$newProduct_images->product_id      = $productUpdate->id;
						$newProduct_images->product_image   = $imageName;
						$newProduct_images->save();
					}
				} else {
					foreach ($old_image  as $img) {
						$newProduct_images                  = new ProductImage();
						$newProduct_images->product_id      = $productUpdate->id;
						$newProduct_images->product_image   = $img;
						$newProduct_images->save();
					}
				}

				//ProductVariant Update code =========================================================================================

				ProductVariant::where('product_id', $request->product_id)->delete();

				foreach ($request->sizes as $index => $sizeId) {
					$colors = $request->colors[$index] ?? [];
					foreach ($colors as $colorId) {
						$newProductVariant = new ProductVariant();
						$newProductVariant->product_id = $productUpdate->id;
						$newProductVariant->size_id = $sizeId;
						$newProductVariant->colour_id = $colorId;
						$newProductVariant->save();
					}
				}

				Session::flash('message', 'Product Update Sucessfully!');
				return redirect()->to('/vendorProduct');
			} else {
				// Validate the request
				// $request->validate([
				// 	'name' => 'required|string|max:64'
				// ]);

				if ($product_image) {
					$imageName = uniqid() . '.' . $product_image->extension();
					$product_image->move(public_path('Productupload'), $imageName);
				}


				$newProduct                  = new Product();
				$newProduct->category_id     = $category;
				$newProduct->product_name    = $product_name;
				$newProduct->product_details = $product_details;
				$newProduct->product_image	 = $imageName;
				$newProduct->product_type    = $product_type;
				$newProduct->gender_type     = $gender_type;
				$newProduct->febric_type_id  = $fab_type;
				$newProduct->product_price	 = $price;
				$newProduct->discount		 = $discount;
				$newProduct->final_price 	 = $finalPrice;
				$newProduct->is_available    = '1';
				$newProduct->is_available    = '1';
				$newProduct->is_deleted      = '0';
				$newProduct->vendor_id 		 = $vendor_id;
				$newProduct->save();

				// save product==================================================================================================

				foreach ($galary_img  as $img) {
					$imageName = uniqid() . '.' . $img->extension();
					$img->move(public_path('Productupload'), $imageName);
					$newProduct_images                  = new ProductImage();
					$newProduct_images->product_id      = $newProduct->id;
					$newProduct_images->product_image   = $imageName;
					$newProduct_images->save();
				}

				// save product images ==================================================================================================


				foreach ($request->sizes as $index => $sizeId) {
					$colors = $request->colors[$index] ?? [];
					foreach ($colors as $colorId) {
						$newProductVariant = new ProductVariant();
						$newProductVariant->product_id = $newProduct->id;
						$newProductVariant->size_id = $sizeId;
						$newProductVariant->colour_id = $colorId;
						$newProductVariant->save();
					}
				}

				// save product Variant ==================================================================================================

			}


			Session::flash('message', 'Product Create Sucessfully!');
			return redirect()->to('/vendorProduct');
		}

		$data['category'] = DB::table('category')->select('category_id', 'category_name')->where('is_active', 1)->where('is_deleted', 0)->get();
		$data['colors'] = DB::table('color_master')->select('color_id', 'color_name', 'color_code')->where('is_active', 1)->where('is_deleted', 0)->get();
		$data['sizes'] = DB::table('size_master')->select('id', 'size_name')->where('is_active', 1)->where('is_deleted', 0)->get();
		$data['febricTypes'] = DB::table('febric_type_master')->select('febric_type_id', 'febric_type_name')->where('is_active', 1)->where('is_deleted', 0)->get();
		return view('front.vendor.add_product', $data);
	}

	public function finalPrice(Request $request)
	{
		$price = $request->input('price');
		$discount = $request->input('discount');
		$finalPrice = $price - ($price * ($discount / 100));
		return response()->json(['final_price' => round($finalPrice, 2)]);
	}
	public function Catalogue()
	{
		//This function is for vendor product list
		$catalogues = Catalogue::where('is_active', '1')->where('is_deleted', '0')->get();
		return view("front/vendor/catalogue_list", compact('catalogues'));
	}

	public function addCatalogue(Request $request, $id = null)
	{
		$catalogue_name	 = $request->catalogue_name;
		$start_price	 = $request->start_price;
		$category_id	 = $request->category_id;
		$gender_type	 = $request->gender_type;
		$vendor_id		 = auth('vendor')->id();



		$data['catalogue'] = '';
		if ($id) {
			$data['catalogue'] = Catalogue::where('id', $id)->first();
			$data['catalogue_images'] = CatalogueImages::where('catalogue_id', $id)->get()->toArray();

			//echo "<pre>";print_r($data['catalogue_images']);die();

		}
		if ($request->isMethod('post')) {
			if ($request->catalogue_id) {


				if ($request->hasFile('img1')) {
					$imageName = uniqid() . '.' . $request->img1->extension();
					$request->img1->move(public_path('Productupload'), $imageName);

					DB::table('catalogue_images')->where('id', $request->image1)->delete();

					$cat = new CatalogueImages;
					$cat->catalogue_id = $request->catalogue_id;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}

				if ($request->hasFile('img2')) {
					$imageName = uniqid() . '.' . $request->img2->extension();
					$request->img2->move(public_path('Productupload'), $imageName);

					DB::table('catalogue_images')->where('id', $request->image2)->delete();

					$cat = new CatalogueImages;
					$cat->catalogue_id = $request->catalogue_id;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}
				if ($request->hasFile('img3')) {
					$imageName = uniqid() . '.' . $request->img3->extension();
					$request->img3->move(public_path('Productupload'), $imageName);

					DB::table('catalogue_images')->where('id', $request->image3)->delete();

					$cat = new CatalogueImages;
					$cat->catalogue_id = $request->catalogue_id;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}
				if ($request->hasFile('img4')) {
					$imageName = uniqid() . '.' . $request->img4->extension();
					$request->img4->move(public_path('Productupload'), $imageName);

					DB::table('catalogue_images')->where('id', $request->image4)->delete();

					$cat = new CatalogueImages;
					$cat->catalogue_id = $request->catalogue_id;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}
				$updateCatalogue = Catalogue::where('id', $request->catalogue_id)->first();
				$updateCatalogue->vendor_id			= $vendor_id;
				$updateCatalogue->category_id		= $category_id;
				$updateCatalogue->catalogue_name	= $catalogue_name;
				$updateCatalogue->start_price		= $start_price;
				$updateCatalogue->category_id		= $category_id;
				$updateCatalogue->gender_type		= $gender_type;
				$updateCatalogue->description		= $request->description;
				$updateCatalogue->is_active		= '1';
				$updateCatalogue->is_deleted		= '0';
				$updateCatalogue->save();


				Session::flash('message', 'Catalogue Update Sucessfully!');
				return redirect()->to('/Catalogue');
			} else {

				$newCatalogue = new Catalogue();
				$newCatalogue->vendor_id		= $vendor_id;
				$newCatalogue->category_id		= $category_id;
				$newCatalogue->catalogue_name	= $catalogue_name;
				$newCatalogue->start_price		= $start_price;
				$newCatalogue->category_id		= $category_id;
				$newCatalogue->gender_type		= $gender_type;
				$newCatalogue->description		= $request->description;
				$newCatalogue->is_active		= '1';
				$newCatalogue->is_deleted		= '0';
				$newCatalogue->save();

				$catalogueId = $newCatalogue->id;

				if ($request->hasFile('img1')) {
					$imageName = uniqid() . '.' . $request->img1->extension();
					$request->img1->move(public_path('Productupload'), $imageName);

					$cat = new CatalogueImages;
					$cat->catalogue_id = $catalogueId;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}

				if ($request->hasFile('img2')) {
					$imageName = uniqid() . '.' . $request->img2->extension();
					$request->img2->move(public_path('Productupload'), $imageName);

					$cat = new CatalogueImages;
					$cat->catalogue_id = $catalogueId;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}
				if ($request->hasFile('img3')) {
					$imageName = uniqid() . '.' . $request->img3->extension();
					$request->img3->move(public_path('Productupload'), $imageName);

					$cat = new CatalogueImages;
					$cat->catalogue_id = $catalogueId;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}
				if ($request->hasFile('img4')) {
					$imageName = uniqid() . '.' . $request->img4->extension();
					$request->img4->move(public_path('Productupload'), $imageName);

					$cat = new CatalogueImages;
					$cat->catalogue_id = $catalogueId;
					$cat->catalogue_image = $imageName;
					$cat->save();
				}

				Session::flash('message', 'Catalogue Create Sucessfully!');
				return redirect()->to('/Catalogue');
			}
		}

		$data['Category']  = Category::where('is_active', '1')->where('is_deleted', '0')->get();
		return view('front.vendor.add_catalogue', $data);
	}

	public function catalogueStatus(Request $request)
	{
		if ($request->type == 'is_active') {
			$result =  DB::table('catalogue')
				->where('id', $request->id)
				->update(
					['is_active' => $request->status]
				);
			if ($result) {
				return response()->json(['success' => true, 'message' => 'Status updated successfully']);
			} else {
				return response()->json(['success' => false, 'message' => 'Failed to update status']);
			}
		}
	}
	public function addDocument(Request $request, $id = null)
	{
		//This function is for vendor document for verification
		$vendor_doc  = Documents::where('vendor_id', auth('vendor')->id())->where('is_deleted', '0')->orderBy('id', 'desc')->get();

		if ($request->isMethod('post')) {
			if (count($vendor_doc) < 7) {
				if ($request->has('files')) {
					foreach ($request->input('files') as $index => $fileGroup) {
						$file = $request->file("files.$index.docu");
						$name = $fileGroup['name'];

						$imageName = "doc" . time() . uniqid() . '.' . $file->getClientOriginalExtension();

						$file->move(public_path('/documents'), $imageName);

						$document = new Documents();
						$document->doc_file = $imageName;
						$document->doc_name = $name;
						$document->vendor_id = auth('vendor')->id();
						$document->verification_status = 0;
						$document->is_deleted = 0;
						$document->save();
					}
				}
				Session::flash('message', 'Document added Sucessfully!');
			} else {
				Session::flash('message', 'You can only add up to 6 files.');
			}

			return redirect()->to('/addDocument');
		}
		return view('front.vendor.add_document', compact('vendor_doc'));
	}
	public function deleteDoc($id)
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

		return redirect()->to('/addDocument');
	}
}
