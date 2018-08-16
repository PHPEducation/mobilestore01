<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SaleFormRequest;
use App\Sale;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    //
    public function index ()
    {
        $sales = Sale::all();

        return view('admin.sales.index', ['sales' => $sales ]);
    }

    public function create ()
    {
        $catalog = Category::whereSlug('dien-thoai')->first();
        $categories = $catalog->categories;

        return view('admin.sales.create', compact('categories') );
    }

    public function store (SaleFormRequest $request)
    {
        Sale::createSale($request);

        return back()->with('status', __('sales.created'));
    }

    public function edit ($id)
    {
        $sale = Sale::findOrFail($id);
        $catalog = Category::whereSlug('dien-thoai')->first();
        $categories = $catalog->categories;
        $product_i = $sale->product;
        $category_i = $product_i->categories;
        $products = Product::where('category_id', '=', $category_i->id)->get();

        return view('admin.sales.edit', compact('sale', 'category_i', 'product_i','categories','products'));
    }

    public function update (SaleFormRequest $request, $id)
    {
        try {
            Sale::updateSale($request, $id);

            return back()->with('status', __('sales.updated'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function delete ($id)
    {
        Sale::deleteSale($id);

        return back()->with('status', __('sales.deleted'));
    }
}
