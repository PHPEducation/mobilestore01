<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
        $products = Product::whereStatus(config('custom.products.publish'))->get();

        return view('home', compact('products'));
    }

    public function user_login ()
    {
        return view('users.login');
    }
}
