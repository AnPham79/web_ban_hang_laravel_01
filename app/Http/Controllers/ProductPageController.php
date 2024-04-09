<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Product;

class ProductPageController extends Controller
{
    public function productPage(Request $request) {
        Paginator::useBootstrap();
        $search = $request->get('q', '');
        $data = Product::query()
        ->where('name_product', 'like', '%' . $search . '%')
        ->paginate(2);

        $data->appends(['q' => $search]);

        return view('product', ['data' => $data, 'search' => $search]);
    }
}
