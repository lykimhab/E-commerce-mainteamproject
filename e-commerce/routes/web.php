<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryConttroller;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//test
Route::get('/index', function () {
    return view('admin.master');
});
Route::get('/das', function () {
    return view('admin.layouts.dashboard');
});

Route::get('/customer', function () {
    return view('customer.layouts.index');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.dashboard');
    });
    //category
    Route::get('/category', [CategoryConttroller::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryConttroller::class, 'store'])->name('category.store');
    Route::get('/category', [CategoryConttroller::class, 'index'])->name('category.index');
    Route::put('/category/{category}', [CategoryConttroller::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryConttroller::class, 'destroy'])->name('category.destroy');

    // ---Product---
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    // ---Product---
    Route::get('/order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::post('/updatestatus/{id}', [AdminOrderController::class, 'updatestatus'])->name('order.updatestatus');
    // Route::get('/order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::put('/order/{order}', [AdminOrderController::class, 'update'])->name('order.update');
    Route::delete('/order/{order}', [AdminOrderController::class, 'destroy'])->name('order.destroy');


});

//Example for user or customer
Route::get('user_index', function () {
    return view('Frontend.index');
});
Route::get('/master', function () {
    return view('Frontend.master');
});
Route::get('/user_category', [FrontendController::class, 'category'])->name('user_category.index');
Route::get('/view-category/{slug}', [FrontendController::class, 'viewcategory'])->name('viewcategory');
Route::get('/view-category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview'])->name('productview');
Route::get('/detail_product/{product}', [FrontendController::class, 'productDetail']);
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('delete/{id}', [CartController::class, 'deletecart']);
    Route::post('order', [OrderController::class, 'comfirmorder']);

});


// ===add cart===

Route::post('/addcart/{id}', [CartController::class, 'addcart'])->name('addcart.index');

//New admin
Route::get('/newAdmin', function () {
    return view('admin.New_admin.master');
    
});
Route::get('/newAdmin_cate', function () {
    return view('admin.New_admin.layout.category.index');

});
Route::get('/newAdmin_user', function () {
    return view('admin.New_admin.layout.user.index');

});

