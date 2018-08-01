<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    //
    protected $guarded = ['id'];

    public function detail_orderable ()
    {
        return $this->morphTo();
    }

    public function order ()
    {
        return $this->belongsTo('App\Order');
    }
}
