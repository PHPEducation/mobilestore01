<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $model;

    public function __construct (Order $order)
    {
        $this->model = new OrderRepository($order);
    }

    public function delete ($id)
    {
        try {
            $this->model->delete($id);

            return redirect()->back()->with('status', __('order.deleted'));
        } catch (Exception $e) {
            abort('404');
        }
    }
}
