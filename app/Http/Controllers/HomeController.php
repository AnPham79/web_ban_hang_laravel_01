<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Comment;
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
        $comment = Comment::where('product_id', $id)
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*', 'users.name')
        ->get();

        return view('show', [
            'data' => $data,
            'comment' => $comment
        ]);
    }

    public function comment(Request $request, $id) {
        $find = product::find($id);

        $data = new Comment;
        $data->user_id = session()->get('id');
        $data->product_id = $find->id;
        $data->feedback = $request->feedback;
        $data->save();

        return redirect()->back();
    }
}
