<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\UploadController;
use App\Category;
use App\Product;
use App\Warehouse;
use App\Image;
use File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function create ()
    {
        $catalogs = Category::whereNull('category_id')->get();
        $categories = Category::whereNotNull('category_id')->get();

        return view('admin.products.create', compact('catalogs', 'categories'));
    }

    public function store (ProductFormRequest $request)
    {
        try {
            if($request->hasFile('images')) {
                $product = Product::createProduct($request);
                $file = $request->images;
                $imageable_type = 'App\Product';
                UploadController::productUploadImages($file, $imageable_type, $product->id);

                return redirect()->back()->with('status', __('product.created'));
            }
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function delete ($id)
    {
        try {
            $product = Product::deleteProduct($id);
            foreach($product->images()->get() as $key => $img) {
                File::delete('images/products/' . $img->image);
            }
            $images = Image::deleteImage('App\Product', $product->id);

            return  redirect()->route('products')->with('status', __('product.deleted') );
        } catch (Exception $e) {
            abort('404');
        }
    }
}
