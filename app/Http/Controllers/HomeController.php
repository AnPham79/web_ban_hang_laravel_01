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

    $data = Product::inRandomOrder()->take(4)->get();

    return view('index', [
        'data' => $data
    ]);
}


    public function show($id)
    {
        $product_popular = Product::query()->limit(4    )->get();
        $more_product = Product::query()->limit(6)->get();
        $data = Product::find($id);
        $comment = Comment::where('product_id', $id)
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*', 'users.name')
        ->get();

        return view('show', [
            'data' => $data,
            'comment' => $comment,
            'product_popular' => $product_popular,
            'more_product' => $more_product
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
