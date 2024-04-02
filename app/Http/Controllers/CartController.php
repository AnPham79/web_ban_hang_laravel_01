<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Enums\CartStatusEnum;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function ViewCart()
    {
        if (!session()->has('role')) {
            return view('Auth.login');
        } else {
            $userId = session()->get('id');
            $cartItems = DB::table('carts')
                ->join('users', 'users.id', '=', 'carts.user_id')
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->select('carts.*','products.name_product', 'products.img_product', 'brands.brand_name')
                ->where('carts.user_id', $userId)
                ->get();

            return view('cart', [
                'cartItems' => $cartItems,
            ]);
        }
    }


    public function addToCart($id)
    {
        $product = Product::find($id);

        if ($product) {
            $existingCartItem = Cart::where('user_id', session()->get('id'))
                ->where('product_id', $product->id)
                ->first();

            if ($existingCartItem) {
                if ($existingCartItem->quantity_prd < 10) {
                    $existingCartItem->quantity_prd += 1;
                    $existingCartItem->save();
                } else {
                    return redirect()->back()->with('error', 'Số lượng sản phẩm đã đạt tối đa.');
                }
            } else {
                $cart = new Cart();
                $cart->user_id = session()->get('id');
                $cart->quantity_prd = 1;
                $cart->product_id = $product->id;
                $cart->price_prd = $product->price_product;
                $cart->status_cart = CartStatusEnum::GIO_HANG;
                $cart->save();
            }
        }

        return redirect()->back();
    }

    public function delCart(Request $request, $id)
    {
        $cartItem = Cart::find($id);

        $cartItem->delete();

        return redirect()->back();
    }

    public function incre($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem->quantity_prd >= 1 && $cartItem->quantity_prd < 10) {
            $cartItem->quantity_prd += 1;
        } elseif ($cartItem->quantity_prd == 10) {
            return redirect()->back()->with('error', 'Số lượng sản phẩm đã đạt tối đa.');
        }

        $cartItem->update([
            'quantity_prd' => $cartItem->quantity_prd
        ]);

        return redirect()->back();
    }


    public function decre($id)
    {
        $cartItem = Cart::find($id);

        $cartItem->quantity_prd -= 1;

        if ($cartItem->quantity_prd == 0) {
            $cartItem->delete();
        } else {

            $cartItem->update([
                'quantity_prd' => $cartItem->quantity_prd,
            ]);
        }

        return redirect()->back();
    }
}
