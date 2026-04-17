<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
    }

    public function edit(string $id)
    {
        $category = Category::findorfail($id);
        return view('dashboard.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findorfail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }


    public function destroy(string $id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
