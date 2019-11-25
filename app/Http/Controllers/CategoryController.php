<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->is_active = 1;
        $category->image('image', $category);
        if ($category->save()) {
            return redirect()->route('categories.index');
        }
    }

    public function edit(Category $category)
    {
       return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->is_active = $request->is_active;
        $category->image('image', $category);
        if ($category->save())
        {
            return redirect()->route('categories.index');
        }
    }

    public function destroy(Category $category)
    {
        if ($category->destroy(request()->id)){
            return back();
        }
    }
}
