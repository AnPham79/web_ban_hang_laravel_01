<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();

        $data = Product::query()
            ->paginate(2);

        if (session()->has('role')) {
            $cartItems = Cart::where('user_id', session()->get('id'))->get();
            $cartCount = $cartItems->count();
            $totalQuantity = $cartItems->sum('quantity_prd');
        } else {
            $totalQuantity = 0;
        }

        $listsp = [];

        return view('index', [
            'data' => $data,
            'listsp' => $listsp,
            'totalQuantity' => $totalQuantity
        ]);
    }

    public function search(Request $request)
    {
        $tukhoa = $request->input('tukhoa');
        $tukhoa = trim(strip_tags($tukhoa));

        Paginator::useBootstrap();

        if ($tukhoa != "") {
            $listsp = Product::where("name_product", "like", "%$tukhoa%")->paginate(2);
        } else {
            $listsp = [];
        }

        if (session()->has('role')) {
            $cartItems = Cart::where('user_id', session()->get('id'))->get();
            $cartCount = $cartItems->count();
            $totalQuantity = $cartItems->sum('quantity_prd');
        } else {
            $totalQuantity = 0;
        }

        $data = Product::paginate(2);
        return view('index', ['tukhoa' => $tukhoa, 'listsp' => $listsp, 'data' => $data, 'totalQuantity' => $totalQuantity]);
    }

    public function show($id)
    {
        $data = Product::find($id);

        return view('show', [
            'data' => $data,
        ]);
    }
}
