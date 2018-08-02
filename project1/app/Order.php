<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = ['id'];

    public function mode_of_payment ()
    {
        return $this->belongsTo('App\Mode_of_payment');
    }

    public function detail_orders ()
    {
        return $this->hasMany('App\Detail_order');
    }
    
    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
