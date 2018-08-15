<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Company;
use App\About;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::whereStatus(config('custom.products.publish'))->orderBy('id', 'DESC')->paginate(config('custom.pagination.products_table'));
        $products_topview = Product::whereStatus(config('custom.products.publish'))->orderBy('view', 'DESC')->paginate(config('custom.pagination.products_table'));
        $lastProduct = Product::orderBy('id', 'DESC')->firstOrFail();
        $catalogs = Category::whereNull('category_id')->get();
        $categories = Category::whereNotNull('category_id')->get();
        $slides = Image::where('of_slide', 1)->orderBy('id', 'DESC')->take(4)->get();

        return view('home', compact('products', 'lastProduct', 'products_topview', 'catalogs', 'categories', 'slides'));
    }

    public function user_login ()
    {
        return view('users.login');
    }
}
