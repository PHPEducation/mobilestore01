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
use App\Sale;
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

    public function index ()
    {
        $products = Product::with(['categories', 'images'])->get();
        
        return view('admin.products.index', compact('products'));
    }

    public function publish (Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;
            $product = Product::findOrFail($id);
            if($status == 1) {
                $product->status = 0;
                $product->save();
            } else if ($status == 0) {
                $product->status = 1;
                $product->save();
            }
            
            return $product;
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function edit ($slug) 
    {
        try {
            $catalogs = Category::whereNull('category_id')->get();
            $categories = Category::whereNotNull('category_id')->get();
            $product = Product::findOrFail($slug);
            $currentCategory = $product->categories;
            $currentCatalog = $currentCategory->catalog;
            $categoryOfCatalog = Category::where('category_id', '=', $currentCatalog->id)->get();
            $warehouse = Warehouse::where('product_id', $product->id)->firstOrFail();
            $sale = Sale::where('product_id', $product->id)->first();

            return view('admin.products.edit', compact('catalogs', 'categories', 'product', 'currentCategory', 'currentCatalog', 'categoryOfCatalog', 'warehouse', 'sale'));
        } catch (Exception $e) {
            abort('404');
        }

    }

    public function update (Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            if($request->hasFile('images')) {
                foreach($product->images()->get() as $img) {
                    File::delete('images/products/' . $img->image);
                }
                $images = Image::deleteImage('App\Product', $product->id);
                $file = $request->images;
                $imageable_type = 'App\Product';
                UploadController::productUploadImages($file, $imageable_type, $product->id);
            }
            $p = Product::updateProduct($request, $id);

           return redirect()->back()->with('status', __('product.created'));

        } catch (Exception $e) {
            abort('404');
        }
    }

    public function show ($slug) 
    {
        try {
            $product = Product::whereSlug($slug)->firstOrFail();

            return view('admin.products.show', compact('product'));
            
        } catch (Exception $e) {
            abort('404');
        }
    }
}
