<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();

        $data = Product::query()
            ->paginate(2);

        $listsp = [];
        return view('index', [
            'data' => $data,
            'listsp' => $listsp,
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

        $data = Product::paginate(2);
        return view('index', ['tukhoa' => $tukhoa, 'listsp' => $listsp, 'data' => $data]);
    }

    public function show($id)
    {
        $data = Product::find($id);

        return view('show', [
           'data' => $data,  
        ]);
    }
}
