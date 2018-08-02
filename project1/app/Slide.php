<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = ['id'];

    public function images ()
    {
        return $this->morphMany('App\Image', 'imageable')
    }
}
