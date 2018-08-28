<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Detail_order;
use App\Repositories\DetailOrderRepository;
use Auth;

class DetailOrderController extends Controller
{
    protected $model;

    public function __construct (Detail_order $detailOrder)
    {
        $this->model = new DetailOrderRepository($detailOrder);
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            $detailOrders = $this->model->whereOrderId($order->id);

            return view('admin.detailOrders.show', compact('order', 'detailOrders'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function userShow($id)
    {
        try {
            $user = Auth::user();
            $this->authorize('update', $user);
            $order = Order::findOrFail($id);
            $detailOrders = $this->model->whereOrderId($order->id);

            return view('users.detailOrders', compact('order', 'detailOrders'));
        } catch (Exception $e) {
            abort('404');
        }
    }
}
