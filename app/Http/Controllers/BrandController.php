<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::all();
        return view('Brand.index', compact('data'));
    }


    public function create()
    {
        return view('Brand.create');
    }

    public function store(BrandRequest $request)
    {
        $data = new Brand;
        $data->fill($request->except('_token'));
        $data->save();

        return redirect()->route('Brand.index')->with('message', 'Brand has been created successfully');
    }

    public function edit($id)
    {
        $data = Brand::find($id);
        return view('Brand.edit', ['data' => $data]);
    }

    public function update(Request $request, Brand $id)
    {
        Brand::where('id', $id->id)->update(
            $request->except('_token', '_method')
        );

        return redirect()->route('Brand.index')->with('message', 'Brand has been updated successfully');
    }

    public function destroy(Request $request, Brand $id)
    {
        $id->delete();

        return redirect()->route('Brand.index')->with('message', 'Brand has been deleted successfully');
    }
}
