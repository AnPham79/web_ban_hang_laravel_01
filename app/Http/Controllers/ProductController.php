<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Excel;
use App\Http\Requests\ProductRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();

        $data = Product::paginate(8);
        return view('Product.index', [
            'data' => $data
        ]);
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

    public function store(ProductRequest $req)
    {
        $data = new Product;
        $data->product_slug = Str::slug($req->name_product);
        $data->fill($req->except('_token'));
        $data->save();

        return redirect()->route('Product.index')->with('success', 'Bạn đã thêm thành công sản phẩm');
    }

    public function edit($id)
    {
        $data = Product::find($id);

        return view('Product.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $req, $id)
    {
        $data = Product::findorFail($id);

        $data->fill($req->except('_token', '_method'));

        $data->save();

        return redirect()->route('Product.index')->with('success', 'Bạn đã sửa thành công sản phẩm');
    }

    public function destroy(Request $req, $id)
    {
        $prd = Product::findOrFail($id);
        $prd->delete();

        return redirect()->route('Product.index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function exportIntoExcel(Excel $excel) { 
        return $excel->download(new ProductExport, 'productlist.xlsx'); 
    }

    public function exportIntoCSV(Excel $excel) {
         return $excel->download(new ProductExport, 'productlist.csv');
    }
}
