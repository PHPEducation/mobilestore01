<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModeOfPayment;
use App\Http\Requests\OrderProductFormRequest;
use App\Order;
use App\Detail_order;
use Cart;
use Carbon\Carbon;
use Auth;
use App\Notify;
use App\Events\NotifyEvent;

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
            event(new NotifyEvent(__('order.hasNewOrder'), route('detail-order', ['id' => $order->id])));
            $notify = [
                'content' => __('order.hasNewOrder'),
                'status' => 0,
                'link' => route('detail.order', ['id' => $order->id])
            ];
            Notify::createNotify($notify);
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
        
    public function statistical (Request $request)
    {
        try {
            $result = \DB::table('orders')->select(\DB::raw('MONTH(created_at) as month'), \DB::raw('SUM(total) as total'))->whereYear('created_at', $request->get('year'))->whereStatus(2)->groupBy(\DB::raw('MONTH(created_at)'))->get();
            if($request->ajax()) {

                return response()->json($result);
            }
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function getYearOrder(Request $request)
    {
        $result = \DB::table('orders')->select(\DB::raw('YEAR(created_at) as year'))->distinct()->get();

        if($request->ajax()) {

            return response()->json($result);
        }
    }

    public function unpublish(Request $request)
    {
        $id = $request->get('id');
        $updateOrder = Order::unpublish($id);

        if($request->ajax()) {
            
            return response()->json($updateOrder);
        }
    }

    public function processed (Request $request)
    {
        try {
            $id = $request->get('id');
            $updateOrder = Order::processed($id);

            if($request->ajax()) {

                return response()->json($updateOrder);
            }
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function orderSuccess()
    {
        $orders = Order::where('status', 1)->paginate(config('custom.pagination.orders_table'));

        return view('users.showOrderDone', compact('orders'));
    }

    public function orderProcessed()
    {
        $orders = Order::where('status', 2)->paginate(config('custom.pagination.orders_table'));

        return view('users.showOrderProcessed', compact('orders'));
    }
}
