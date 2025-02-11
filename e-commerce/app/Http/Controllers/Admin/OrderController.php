<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        $names = User::all();
        $product_names = Product::all();
        return view('admin.layouts.order.index', compact('orders', 'names', 'product_names'));
    }
    public function updatestatus($id)
    {
        $order = Orders::find($id);
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back();

    }

}