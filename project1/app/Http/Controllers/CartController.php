<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function add ($id)
    {
        $product = Product::findOrFail($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'slug' => $product->slug,
            ]
        ]);

        return redirect()->route('all-cart');
    }

    public function index ()
    {
        $cart = Cart::content();
        
        return view('users.allCart', compact('cart'));
    }

    public function delete ($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('status', __('cart.deleted'));
    }

    public function update (Request $request, $id)
    {
        if($request->ajax()) {
            $cart = [];
            $qty = $request->get('qty');
            $cart[] = Cart::update($id, $qty);
            $cart[] = ['subtotal' => Cart::subtotal()];
            $cart[] = ['count' => Cart::count()];

            return response()->json($cart);
        }
    }
}
