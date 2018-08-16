<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;

class Order extends Model
{
    //
    protected $guarded = ['id'];

    public function mode_of_payment ()
    {
        return $this->belongsTo('App\ModeOfPayment');
    }

    public function detail_orders ()
    {
        return $this->hasMany('App\Detail_order');
    }
    
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeCreateOrder($query, $request, $total, $user_id = null)
    {
        try {
            $order = Order::create([
                'name' => $request->get('name'),
                'total' => $total,
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'mode_of_payment_id' => $request->get('modeOfPayment'),
                'user_id' => $user_id
            ]);
            $cart = Cart::content();
            foreach($cart as $item) {
                $order_detail = Detail_order::create([
                    'detail_orderable_id' => $item->id,
                    'detail_orderable_type' => 'App\Product',
                    'order_id' => $order->id,
                    'price' => $item->price,
                    'quantity' => $item->qty
                ]);
            }


            return $order;
        } catch(Exception $e) {
            abort('404');
        }
    }
    
    public function scopeUnpublish($query, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update([
                'status' => 1
            ]);
            
            return $order;

        } catch (Exception $e) {
            abort('404');
        }
    }
}
