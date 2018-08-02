<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode_of_payment extends Model
{
    //
    protected $guarded = ['id'];
    
    public function orders ()
    {
        return $this->hasMany('App\Order');
    }
}
