<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Enums\InvoiceStatusEnum;

use App\Models\Invoice;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Mail;

use App\Mail\Bill;

class InvoiceController extends Controller
{
    public function PagePay()
    {
        $userId = session()->get('id');
        $cart_items = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('carts.*', 'products.name_product', 'products.img_product', 'brands.brand_name')
            ->where('carts.user_id', $userId)
            ->get();

        session()->flash('cart_items', $cart_items);

        $totalPrice = 0;

        foreach ($cart_items as $item) {
            $price = $item->price_prd;
            $quantity = $item->quantity_prd;

            $subtotal = $price * $quantity;

            $totalPrice += $subtotal;
        }

        return view('pay', [
            'result' => $cart_items,
            'totalPrice' => $totalPrice
        ]);
    }

    public function pay()
    {
        $user_id = session()->get('id');

        $cart_items = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;
        $billDetails = [];

        foreach ($cart_items as $item) {
            $product = Product::find($item->product_id);
            $user = User::find($item->user_id);

            $price = $item->price_prd;
            $quantity = $item->quantity_prd;

            $subtotal = $price * $quantity;

            $totalPrice += $subtotal;

            // Thêm thông tin sản phẩm và người dùng vào mảng $billDetails
            $billDetails[] = [
                'product' => $product,
                'user' => $user,
                'quantity' => $item->quantity_prd,
                'unit_price' => $item->price_prd,
                'total_price' => $totalPrice,
            ];
        }

        $invoice = new Invoice;
        $invoice->user_id = $user_id;
        $invoice->total_price = $totalPrice;
        $invoice->status_invoices = InvoiceStatusEnum::CHO_XAC_NHAN;
        $invoice->save();

        $invoice_id = $invoice->id;

        // Tạo mới các chi tiết hóa đơn và lưu vào cơ sở dữ liệu
        foreach ($cart_items as $item) {
            $product_id = $item->product_id;
            $invoice_detail = new InvoiceDetail;
            $invoice_detail->invoice_id = $invoice_id;
            $invoice_detail->product_id = $product_id;
            $invoice_detail->user_id = $user_id;
            $invoice_detail->quantity = $item->quantity_prd;
            $invoice_detail->unit_price = $item->price_prd;
            $invoice_detail->total_price = $item->price_prd * $item->quantity_prd;
            $invoice_detail->save();
        }

        Mail::to(session()->get('email'))->send(new Bill($billDetails, $totalPrice));

        Cart::where('user_id', $user_id)->delete();
    }
}
