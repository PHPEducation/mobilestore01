<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function categories ()
    {
        return $this->morphToMany('App\Category', 'categorizable');
    }
    
    public function images ()
    {
        return $this->morphMany('App\Image', 'imageable')
    }
}
