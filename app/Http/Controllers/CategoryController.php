<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // List (Read) + Search
    public function index(Request $request)
    {
        // Mulai dari base query
        $query = Category::query();

        // 🔎 Kalau ada keyword ?search= di URL, filter berdasarkan name
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('name', 'like', "%{$search}%");
        }

        // Paginate seperti sebelumnya
        $categories = $query->latest()->paginate(10);

        // Kirim juga nilai search biar bisa dipakai di view
        return view('categories.index', [
            'categories' => $categories,
            'search'     => $request->search,
        ]);
    }

    // Form Create
    public function create()
    {
        return view('categories.create');
    }

    // Simpan Create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:categories,name'],
        ]);

        Category::create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // Form Edit
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Simpan Update
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:categories,name,' . $category->id],
        ]);

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // Delete
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
