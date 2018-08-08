<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeOfPayment;
use Auth;

class OrderDetailController extends Controller
{
    public function enterInfo()
    {
    	$payments = ModeOfPayment::pluck('name', 'id')->all();
    	$user = Auth::check() ? Auth::user() : null;

    	return view('users.enterInfo', compact('payments', 'user'));
    }
}
