<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_categories' => 'required|max:100|unique:categories,nama_categories',
            'deskripsi' => 'nullable|max:255',
        ]);

        Category::create($data);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'nama_categories' => 'required|max:100|unique:categories,nama_categories,'
                . $category->id_categories . ',id_categories',
            'deskripsi' => 'nullable|max:255',
        ]);

        $category->update($data);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }

    // OPTIONAL (boleh dipakai / boleh dihapus)
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
}
