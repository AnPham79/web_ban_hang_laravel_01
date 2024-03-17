<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        return view('Product.index');
    }


    public function create()
    {
        // sử dụng pluck trong eloquent để trích xuất 1 bảng ghi cụ thể
        $categories = Category::pluck('category_name', 'id');
        $brands = Brand::pluck('brand_name', 'id');

        return view('Product.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
