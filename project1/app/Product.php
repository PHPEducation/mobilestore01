<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = ['id'];

    public function categories ()
    {
        return $this->morphToMany('App\Category', 'categorizable');
    }
    
    public function images ()
    {
        return $this->morphMany('App\Image', 'imageable')
    }

    public function orders ()
    {
        return $this->hasMany('App\Order');
    }

    public function warehouse ()
    {
        return $this->hasOne('App\Warehouse');
    }

    public function sales ()
    {
        return $this->hasMany('App\Sale');
    }

    public function reviews ()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }
}
