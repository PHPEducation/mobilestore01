<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
