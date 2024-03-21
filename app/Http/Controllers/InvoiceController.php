<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\InvoiceStatusEnum;

use App\Models\Invoice;
use App\Models\Cart;
use App\Models\InvoiceDetail;
use App\Models\Product;

class InvoiceController extends Controller
{
    public function PagePay()
    {
        $result = Cart::where('user_id', session()->get('id'))->get();

        $totalPrice = 0;

        foreach ($result as $item) {
            $price = $item->price_prd;
            $quantity = $item->quantity_prd;

            $subtotal = ($price / $quantity) * $quantity;

            $totalPrice += $subtotal;
        }

        return view('pay', [
            'result' => $result,
            'totalPrice' => $totalPrice
        ]);
    }

    public function pay()
    {
        $user_id = session()->get('id');

        // Lấy thông tin giỏ hàng của người dùng
        $cart_items = Cart::where('user_id', $user_id)->get();

        // Tính tổng giá tiền của hóa đơn
        $totalPrice = 0;
        foreach ($cart_items as $item) {
            $totalPrice += $item->price_prd * $item->quantity_prd;
        }

        // Tạo mới một hóa đơn và lưu vào cơ sở dữ liệu
        $invoice = new Invoice;
        $invoice->user_id = $user_id;
        $invoice->total_price = $totalPrice;
        $invoice->status_invoices = InvoiceStatusEnum::CHO_XAC_NHAN;
        $invoice->save();

        // Lấy ID của hóa đơn vừa được tạo
        $invoice_id = $invoice->id;

        $product_name = $item->name_prd; // Lấy tên sản phẩm từ giỏ hàng
        $product_id = Product::where('name_product', $product_name)->value('id'); // Tìm product_id từ tên sản phẩm

        // Tạo mới các chi tiết hóa đơn và lưu vào cơ sở dữ liệu
        foreach ($cart_items as $item) {
            $invoice_detail = new InvoiceDetail;
            $invoice_detail->invoice_id = $invoice_id;
            $invoice_detail->product_id = $product_id;
            $invoice_detail->user_id = $user_id;
            $invoice_detail->quantity = $item->quantity_prd;
            $invoice_detail->unit_price = $item->price_prd;
            $invoice_detail->total_price = $item->price_prd * $item->quantity_prd;
            $invoice_detail->save();
        }

        Cart::where('user_id', $user_id)->delete();
    }
}
