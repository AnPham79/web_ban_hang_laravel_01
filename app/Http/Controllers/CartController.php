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

            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $price = $item->price_prd;
                $quantity = $item->quantity_prd;
            
                $subtotal = ($price / $quantity) * $quantity;
            
                $totalPrice += $subtotal;
            }
            
            return view('cart', [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice
            ]);
        }
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if ($product) {
            $existingCartItem = Cart::where('user_id', session()->get('id'))
                ->where('name_prd', $product->name_product)
                ->first();

            if ($existingCartItem) {
                if ($existingCartItem->quantity_prd < 10) {
                    $existingCartItem->quantity_prd += 1;
                    $newPrice = $product->price_product * $existingCartItem->quantity_prd;
                    $existingCartItem->price_prd = $newPrice;
                    $existingCartItem->save();
                } else {
                    return redirect()->back()->with('error', 'Số lượng sản phẩm đã đạt tối đa.');
                }
            } else {
                $cart = new Cart();
                $cart->user_id = session()->get('id');
                $cart->name_prd = $product->name_product;
                $cart->img_prd = $product->img_product;
                $cart->quantity_prd = 1;
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
            $newPrice = ($cartItem->price_prd / ($cartItem->quantity_prd - 1)) * $cartItem->quantity_prd;
        } elseif ($cartItem->quantity_prd == 10) {
            return redirect()->back()->with('error', 'Số lượng sản phẩm đã đạt tối đa.');
        }

        $cartItem->update([
            'quantity_prd' => $cartItem->quantity_prd,
            'price_prd' => $newPrice
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
            $newPrice = ($cartItem->price_prd / ($cartItem->quantity_prd + 1)) * $cartItem->quantity_prd;

            $cartItem->update([
                'quantity_prd' => $cartItem->quantity_prd,
                'price_prd' => $newPrice
            ]);
        }

        return redirect()->back();
    }
}
