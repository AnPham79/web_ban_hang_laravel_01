<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('Category.index', compact('data'));
    }


    public function create()
    {
        return view('Category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = new Category;
        $data->fill($request->except('_token'));
        $data->save();

        return redirect()->route('Category.index')->with('message', 'Category has been created successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = Category::find($id);
        return view('Category.edit', ['data' => $data]);
    }

    public function update(Request $request, Category $id)
    {
        Category::where('id', $id->id)->update(
            $request->except('_token', '_method')
        );

        return redirect()->route('Category.index')->with('message', 'Category has been updated successfully');
    }

    public function destroy(Request $request, Category $id)
    {
        $id->delete();

        return redirect()->route('Category.index')->with('message', 'Category has been deleted successfully');
    }
}
