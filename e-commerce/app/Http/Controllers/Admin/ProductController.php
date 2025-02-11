<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.layouts.product.index', compact('products', 'categories'));
    }

    public function create()
    {
        // Load the create category form view
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validate and save the new product
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            // Allow multiple images
            'qty_stock' => 'required|integer',
            'tax' => 'required|numeric',
            'status' => 'required|boolean',
            'trending' => 'required|boolean',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
        ]);

        $imageNames = [];
        $uploadErrors = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    // Upload the image
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $imageNames[] = $imageName;
                } else {
                    // Log or display the error message
                    $uploadErrors[] = $image->getError();
                }
            }
        }

        // Check for upload errors
        if (!empty($uploadErrors)) {
            // Log or display upload errors
            foreach ($uploadErrors as $error) {
                // Handle errors (e.g., display error messages)
                Log::error($error);
            }

            // Redirect back with error messages
            return redirect()->back()->withInput()->withErrors(['images' => 'There was an error uploading images.']);
        }

        // Serialize the array of image filenames before saving to the database
        $serializedImageNames = serialize($imageNames);
        $validatedData['images'] = $serializedImageNames;
        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }



    public function show(Category $category)
    {
        // Load the edit category form view
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Product $product)
    {
        // Validate and save the new product
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'small_description' => 'required|string',
            'description' => 'required|string',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
            // Allow multiple images
            'qty_stock' => 'required|integer',
            'tax' => 'required|numeric',
            'status' => 'required|boolean',
            'trending' => 'required|boolean',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
        ]);

        $imageNames = [];
        $uploadErrors = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    // Upload the image
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $imageNames[] = $imageName;
                } else {
                    // Log or display the error message
                    $uploadErrors[] = $image->getErrorMessage();
                }
            }
        }

        // Check for upload errors
        if (!empty($uploadErrors)) {
            // Log or display upload errors
            foreach ($uploadErrors as $error) {
                // Handle errors (e.g., display error messages)
                Log::error($error);
            }
        }

        // If new images are uploaded, update the image field
        if (!empty($imageNames)) {
            // Serialize the array of image filenames before saving to the database
            $serializedImageNames = serialize($imageNames);
            $validatedData['images'] = $serializedImageNames;
        }

        // Update the product with the new data
        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        // Delete the category
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}