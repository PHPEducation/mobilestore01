<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $guarded = ['id'];

    public function product ()
    {
        return belongsTo('App\Product');
    }
}
