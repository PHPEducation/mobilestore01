<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class HomeController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('status', 0)->get();

        return view('admin.home', compact('orders'));
    }
}
