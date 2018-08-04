<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = ['id'];

    public function accessories () {
        return $this->hasMany('App\Accessory');
    }

    public function products () {
        return $this->hasMany('App\Product');
    }
    
    public function news () {
        return $this->hasMany('App\New');
    }
}
