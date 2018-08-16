<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchFormRequest;
use App\Product;
use App\Review;

class ProductController extends Controller
{
    public function show (Request $request, $slug)
    {
        try {
            $product = Product::findOrFail($slug);
            $reviews = Review::with('user')->where('reviewable_id' , $product->id)->where('reviewable_type', 'App\Product')->paginate(config('custom.pagination.reviews_table'));
            if($request->ajax()) {

                return response()->json($reviews);
            }
            $view = $product->view;
            $view += 1;
            $product->update([
                'view' => $view, 
            ]);

            return view('users.showProduct', compact('product', 'reviews'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function search (SearchFormRequest $request)
    {
        try {
            $key = $request->get('search');
            $products = Product::where('name', 'like', "%$key%")->paginate(config('custom.pagination.products_table'));

            return view('users.searchProducts', compact('products'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function searchAndroid ()
    {
        try {
            $products = Product::where('operating_system', 'like', "android%")->paginate(config('custom.pagination.products_table'));

            return view('users.showProductNav', compact('products'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function searchApple ()
    {
        try {
            $products = Product::where('operating_system', 'like', "apple%")->paginate(config('custom.pagination.products_table'));

            return view('users.searchProducts', compact('products'));
        } catch (Exception $e) {
            abort('404');
        }
    }
}
