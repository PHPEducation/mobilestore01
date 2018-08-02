<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    //
    protected $guarded = ['id'];

    public function categories ()
    {
        return $this->morphToMany('App\Category', 'categorizable');
    }
}
