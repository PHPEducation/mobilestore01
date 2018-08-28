<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected $guarded = ['id'];
    
    public function product ()
    {
        return $this->hasOne('App\Product');
    }
}
