<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;


class CustomerCartController extends Controller
{
    public function productAddToCart(Request $request)
    {
        
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;

        if (auth('user')->check()) {
            // For logged-in users, use the database cart
            $customerId = auth('user')->id();
            $cart = Cart::firstOrCreate(['customer_id' => $customerId]);

            $existingCartDetail = CartDetail::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->first();

            if ($existingCartDetail) {
                return response()->json(['message' => 'Product already in cart'], 200);
            }

            CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);

            return response()->json(['message' => 'Product added to cart successfully'], 201);
        } else {
            // For guests, use the session cart
            $cart = session()->get('guest_cart', []);

            // Check if product already exists in the cart
            if (isset($cart[$productId])) {
                return response()->json(['message' => 'Product already in cart'], 200);
            }

            // Add product to the cart
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
            ];

            // Save the cart back to the session
            session(['guest_cart' => $cart]);

            return response()->json(['message' => 'Product added to cart successfully'], 201);
        }
    }

    public function productShowCart()
    {
        $cartItems = [];        
        if (auth('user')->check()) {
            $cart = Cart::where('customer_id', auth('user')->id())->first();
            if ($cart) {
				$cartItems = CartDetail::where('cart_id', $cart->id)
				->with('product') 
				->get();
            }
        } else {
            $cart = session()->get('guest_cart', []);
            $cartItems = collect($cart)->map(function ($item) {
                $product = Product::find($item['product_id']);
                return [
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'quantity' => $item['quantity'],
                    'price' => $product->product_price,
                ];
            });
        }

        dd($cartItems);
        return view( "front/user/view__cart_product", compact('cartItems'));
    }


	/*************************************[CATALOGUE ADD TO CART START]*********************************************/
    public function saveDesignId(Request $request)
	{
		//This function is for save catalogue design id in session
		session(['catalogue_id' => $request->catalogue_id]);
        if($request->type=='fabric')
        {
		    return response()->json(['success' => true,  'redirect_url' => url('/browseFebrics')]);
        }
        if($request->type=='mesurment')
        {
		    return response()->json(['success' => true,  'redirect_url' => url('/mesurment')]);
        }
	}
    public function catalogueAddCart(Request $request)
    {
        //This function is for catalogue design add to cart
    }
    /*************************************[CATALOGUE ADD TO CART END]*********************************************/
}
