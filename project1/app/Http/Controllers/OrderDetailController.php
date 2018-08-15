<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeOfPayment;
use App\Http\Requests\OrderProductFormRequest;
use App\Order;
use App\Detail_order;
use Cart;
use Auth;

class OrderDetailController extends Controller
{
    public function enterInfo()
    {
        $payments = ModeOfPayment::pluck('name', 'id')->all();
        $user = Auth::check() ? Auth::user() : null;

        return view('users.enterInfo', compact('payments', 'user'));
    }

    public function addOrder (OrderProductFormRequest $request)
    {
        try {
            $total = (int)(str_replace(',', '', Cart::subtotal()));
            $user_id = Auth::check() ? Auth::user()->id : null;
            $order = Order::createOrder($request, $total, $user_id);
            Cart::destroy();

            return view('users.buySuccess');
        } catch(Exception $e) {
            abort('404');
        }
        
    }

    public function boughtProducts ()
    {
        try {
            if(Auth::check()) {
                $user = Auth::user();
                $ordered = Order::with('detail_orders')->where('user_id', $user->id)->get();

                return view('users.showBoughtProducts', compact('ordered'));
            }
        } catch (Exception $e) {
            abort('404');
        }
        
    }
}
