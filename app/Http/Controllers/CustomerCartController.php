<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;


class CustomerCartController extends Controller
{
    // public function productAddToCart(Request $request)
    // {

    //     $customerId = auth('user')->id(); 
    //     $productId = $request->product_id;
    //     $quantity = $request->quantity ?? 1;

    //     //Checks if a cart exists for the logged-in customer and returns it. If not, it creates a new cart.
    //     $cart = Cart::firstOrCreate(['customer_id' => $customerId]);

    //     // Check if the product already exists in the cart details
    //     $existingCartDetail = CartDetail::where('cart_id', $cart->id)
    //         ->where('product_id', $productId)
    //         ->first();

    //     if ($existingCartDetail) {
    //         return response()->json(['message' => 'Product already in cart'], 200);
    //     }

    //     // If the product is not in the cart, add it
    //     CartDetail::create([
    //         'cart_id' => $cart->id,
    //         'product_id' => $productId,
    //         'quantity' => $quantity,
    //     ]);

    //     return response()->json(['message' => 'Product added to cart successfully'], 201);
    // }

    // public function productAddToCart(Request $request)
    // {
    //     $sessionId = session()->getId(); // Get the current session ID
    //     $customerId = auth('user')->id(); // Check if the user is logged in
    //     $productId = $request->product_id;
    //     $quantity = $request->quantity ?? 1;

    //     // Find or create a cart
    //     $cart = Cart::firstOrCreate(
    //         [
    //             'customer_id' => $customerId,
    //             'session_id' => $customerId ? null : $sessionId,
    //         ],
    //         [
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]
    //     );

    //     // Check if the product is already in the cart details
    //     $existingCartDetail = CartDetail::where('cart_id', $cart->id)
    //         ->where('product_id', $productId)
    //         ->first();

    //     if ($existingCartDetail) {
    //         return response()->json(['message' => 'Product already in cart'], 200);
    //     }

    //     // Add the product to cart details
    //     CartDetail::create([
    //         'cart_id' => $cart->id,
    //         'product_id' => $productId,
    //         'quantity' => $quantity,
    //     ]);

    //     return response()->json(['message' => 'Product added to cart successfully'], 201);
    // }

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
                $cartItems = CartDetail::where('cart_id', $cart->id)->get();
            }
        } else {
            $cart = session()->get('guest_cart', []);
            $cartItems = collect($cart)->map(function ($item) {
                $product = Product::find($item['product_id']);
                return [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ];
            });
        }

        dd($cartItems);
        // return view( "front/product_show_cart", compact('cartItems'));
    }
}
