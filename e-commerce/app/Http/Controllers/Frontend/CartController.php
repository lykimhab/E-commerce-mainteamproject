<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewcart(Product $product)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();

        // Deserialize the images if they are stored as serialized data
        foreach ($cartitems as $cartitem) {
            $cartitem->product->images = unserialize($cartitem->product->images);
        }

        return view('Frontend.cart', compact('cartitems'));


    }
    public function addcart(Request $request, $id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $product = Product::find($id);

            $cart = new Cart;
            $cart->user_id = $user->id; // Use the user's ID, not name
            $cart->product_id = $product->id;
            $cart->quantity = $request->qty;
            $cart->save();
            return redirect()->back()->with('success', 'Added cart successfully');

        } else {
            return redirect('login');
        }
    }
    public function deletecart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();

    }
}