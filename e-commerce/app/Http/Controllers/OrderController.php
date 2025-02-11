<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function comfirmorder(Request $request)
    {
        $user = auth()->user();
        $name = $user->id;
        $phone = $user->phone;
        $address = $user->address;

        foreach ($request->productname as $key => $productname) {
            $order = new Orders;
            $order->product_name = $request->productname[$key];
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'not delivery';
            $order->save();
        }
        DB::table('carts')->where('user_id', $name)->delete();

        return redirect()->back();

    }

}