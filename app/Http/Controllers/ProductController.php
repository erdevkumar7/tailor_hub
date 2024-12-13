<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\FebricType;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Session;

class ProductController extends Controller
{
    //
    public function Products(){
        $data['products'] = Product::all();
        return view("front/products/index",$data);
    }

    public function createProduct(){
        $data['category'] = Category::all();
        $data['febrictype'] = FebricType::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view("front/products/create",$data);
    }

    public function productStore(Request $request){
        $category           = $request->category;
        $product_name       = $request->product_name;
        $img                = $request->img;
        $galary_img         = $request->galary_img;
        $product_type       = $request->product_type;
        $fabric_type        = $request->fabric_type;
        $gender_type        = $request->gender_type;
        $product_details    =$request->product_details;

        // product varient 

        $sizes               = $request->sizes;
        $colors              = $request->color;

        // ====================================

        $newProduct                  = new Product();
        $newProduct->category_id     = $category;
        $newProduct->product_name    = $product_name;
        $newProduct->product_details = $product_details;
        $newProduct->product_type    = $product_type;
        $newProduct->gender_type     = $gender_type;
        $newProduct->is_available    = '1';
        $newProduct->is_available    = '1';
        $newProduct->is_deleted      = '0';
        $newProduct->save();

        foreach($galary_img  as $img){
            $imageName = uniqid().'.'.$request->img->extension();
            $request->img->move(public_path('Productupload'), $imageName);
            $newProduct_images                  = new ProductImage();
            $newProduct_images->product_id      = $newProduct->id;
            $newProduct_images->product_image   = $imageName;
            $newProduct_images->save();
        }

        // foreach ($sizes as $size) {
        //     // Ensure this size has corresponding colors
        //     if (isset($colors[$size]) && is_array($colors[$size])) {
        //         foreach ($colors[$size] as $color) {
        //             // Create a new Variant for each size and color combination
        //             $newProductVariant = new ProductVariant();
        //             $newProductVariant->product_id = $newProduct->id; // Assuming $newProduct is already created
        //             $newProductVariant->size_id = $size;
        //             $newProductVariant->colour_id = $color;
        //             $newProductVariant->save();
        //         }
        //     }
        // }

        Session::flash('message', 'Product Create Sucessfully!');
        return redirect()->to('/Products');

    }
}
