<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // list (Read)
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    // form Create
    public function create()
    {
        return view('categories.create');
    }

    // simpan Create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','min:3','max:100','unique:categories,name'],
        ]);

        Category::create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success','Category created successfully.');
    }

    // form Edit
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // simpan Update
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required','string','min:3','max:100','unique:categories,name,'.$category->id],
        ]);

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success','Category updated successfully.');
    }

    // Delete
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success','Category deleted successfully.');
    }
}
