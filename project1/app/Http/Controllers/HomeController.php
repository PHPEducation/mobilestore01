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
        $rams = Product::distinct('ram')->orderBy('ram', 'DESC')->pluck('ram');
        $hardDisks = Product::distinct('hard_disk')->orderBy('hard_disk', 'DESC')->pluck('hard_disk');
        $pins = Product::distinct('pin')->orderBy('pin', 'DESC')->pluck('pin');
        $screens = Product::distinct('screen')->orderBy('screen', 'DESC')->pluck('screen');

        return view('home', compact('products', 'lastProduct', 'products_topview', 'catalogs', 'categories', 'slides', 'rams', 'hardDisks', 'pins', 'screens'));
    }

    public function user_login ()
    {
        return view('users.login');
    }
}
