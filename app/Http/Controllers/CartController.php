<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Enums\CartStatusEnum;

class CartController extends Controller
{
    public function ViewCart()
    {
        if (!session()->has('role')) {
            return view('Auth.login');
        } else {
            $cartItems = Cart::where('user_id', session()->get('id'))->get();

            return view('cart', [
                'cartItems' => $cartItems
            ]);
        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if ($product) {
            $cart = new Cart();
            $cart->user_id = session()->get('id');
            $cart->name_prd = $product->name_product;
            $cart->img_prd = $product->img_product;
            $cart->quantity_prd = 1;
            $cart->price_prd = $product->price_product;
            $cart->status_cart = CartStatusEnum::GIO_HANG;
            $cart->save();
        }

        return redirect()->back();
    }
}
