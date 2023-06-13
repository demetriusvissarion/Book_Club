<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        Category::create(request()->except('_token'));

        return redirect('/admin/categories')->with('success', 'Category Created!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category, Request $request)
    {
        $category->update(request()->except('_token', '_method'));

        return redirect('/admin/categories')->with('success', 'Category Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories')->with('success', 'Category Deleted!');
    }
}
