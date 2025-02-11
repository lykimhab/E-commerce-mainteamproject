<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('Frontend.index', compact('featured_products', 'trending_category'));
    }
    public function category()
    {
        $category = Category::where('status', '1')->get();
        return view('Frontend.category', compact('category'));
    }
    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '1')->get();

            // Unserialize the images attribute for each product
            foreach ($products as $product) {
                $product->images = unserialize($product->images);
            }

            // Pass the $slug variable to the view
            return view('Frontend.product.index', compact('products', 'category', 'slug'));
        } else {
            return redirect('/')->with('status', 'Slug does not exist');
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $product = Product::where('slug', $prod_slug)->first();
                return view('Frontend.product.detail_product', compact('product'));
            } else {
                return redirect('/')->with('status', 'Product does not exist');
            }
        } else {
            return redirect('/')->with('status', 'Category does not exist');
        }

    }
    public function productDetail($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return abort(404); // Product not found, return a 404 error
        }

        // Unserialize the images attribute for the product
        $product->images = unserialize($product->images);

        // Assuming you have an 'images' attribute in your product model
        $productImages = $product->images;

        return view('Frontend.product.detail_product', compact('product', 'productImages'));
    }



}