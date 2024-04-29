<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Enums\InvoiceStatusEnum;

use App\Models\Invoice;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\shipping;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

use App\Mail\Bill;

class InvoiceController extends Controller
{
    public $discount;
    public function PagePay()
    {
        $response = Http::get('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json');

        if ($response->successful()) {
            $data = $response->json();
            $provinces = $data;

            return view('pay', ['provinces' => $provinces]);
        }
    }

    public function pay(Request $request)
    {
        $user_id = session()->get('id');

        $cart_items = Cart::where('user_id', $user_id)->get();

        $totalPrice = 0;
        $billDetails = [];

        foreach ($cart_items as $item) {
            $product_id = Product::find($item->product_id);

            $price = $item->price_prd;
            $quantity = $item->quantity_prd;

            $subtotal = $price * $quantity;

            $totalPrice += $subtotal;

            // Thêm thông tin sản phẩm và người dùng vào mảng $billDetails
            $billDetails[] = [
                'product_id' => $product_id,
                'quantity' => $item->quantity_prd,
                'unit_price' => $item->price_prd,
                'total_price' => $totalPrice,
            ];
        }

        $invoice = new Invoice;
        $invoice->user_id = $user_id;
        $invoice->total_price = $totalPrice;
        $invoice->status_invoices = InvoiceStatusEnum::CHO_XAC_NHAN;
        $invoice->user_name = request('user_name');
        $invoice->phone_number = request('phone_number');
        if($this->discount)
        {
            $invoice->discount = request('discount');
        }else {
            $invoice->discount = 0;
        }
        $invoice->email = request('email');
        $invoice->province = request('province');
        $invoice->city = request('city');
        $invoice->commune = request('commune');
        $invoice->address = request('address');
        $invoice->save();

        $invoice_id = $invoice->id;

        $invoice = new shipping();
        $invoice->user_name = request('user_name');
        $invoice->phone_number = request('phone_number');
        $invoice->email = request('email');
        $invoice->province = request('province');
        $invoice->city = request('city');
        $invoice->commune = request('commune');
        $invoice->address = request('address');
        $invoice->invoice_id = $invoice_id;
        $invoice->save();

        // order details
        foreach ($cart_items as $item) {
            $product_id = $item->product_id;
            $invoice_detail = new InvoiceDetail;
            $invoice_detail->invoice_id = $invoice_id;
            $invoice_detail->product_id = $product_id;
            $invoice_detail->quantity = $item->quantity_prd;
            $invoice_detail->unit_price = $item->price_prd;
            $invoice_detail->subtotal = $item->price_prd * $item->quantity_prd;
            $invoice_detail->save();
        }

        Mail::to(session()->get('email'))->send(new Bill($billDetails, $totalPrice));

        Cart::where('user_id', $user_id)->delete();
    }

    public function orderHistory()
    {
        if (session()->has('id')) {
            $data = InvoiceDetail::join('products', 'invoice_details.product_id', '=', 'products.id')
                ->join('users', 'invoice_details.user_id', '=', 'users.id')
                ->join('invoices', 'invoice_details.invoice_id', '=', 'invoices.id')
                ->select('invoice_details.*', 'products.name_product', 'users.name', 'users.email', 'users.address', 'users.phone', 'invoices.status_invoices')
                ->where('invoice_details.user_id', session()->get('id'))
                ->get();

            return view('order_history', compact('data'));
        }
    }

    public function cancelOrder($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            $invoice->update(['status_invoices' => 4]);
        }

        // dd($invoice);

        return redirect()->back();
    }

    public function changeStatus($id)
    {
    }
}
