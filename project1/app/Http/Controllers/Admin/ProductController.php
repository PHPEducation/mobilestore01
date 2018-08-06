<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function create ()
    {
    	$catalogs = Category::whereNull('category_id')->get();
    	$categories = Category::whereNotNull('category_id')->get();

    	return view('admin.products.create', compact('catalogs', 'categories'));
    }
}
