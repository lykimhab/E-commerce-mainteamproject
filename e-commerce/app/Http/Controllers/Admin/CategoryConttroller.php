<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryConttroller extends Controller
{
    //    public function index(){
//         return view('admin.layouts.category.index');
//    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.layouts.category.index', compact('categories'));
    }

    public function create()
    {
        // Load the create category form view
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validate and save the new category
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories|max:255',
            'description' => 'required|string',
            'status' => 'required|integer',
            'popular' => 'required|integer',
            'meta_title' => 'required|string|max:255',
            'meta_descrip' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);

        Category::create($validatedData);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        // Load the edit category form view
        return view('categories.edit', compact('category'));
    }
    

    public function update(Request $request, Category $category)
    {
        // Validate and update the category
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|unique:categories|max:255',
            'description' => 'required|string',
            'status' => 'required|integer',
            'popular' => 'required|integer',
            'meta_title' => 'required|string|max:255',
            'meta_descrip' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
        ]);

        $category->update($validatedData);


        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}