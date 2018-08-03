<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = ['id'];

    public function accessories () 
    {
        return $this->morphedByMany('App\Accessory', 'categorizable');
    }

    public function products () 
    {
        return $this->morphedByMany('App\Product', 'categorizable');
    }
    
    public function news () 
    {
        return $this->morphedByMany('App\New', 'categorizable');
    }

    public function catalog ()
    {
        return $this->belongsTo(self::class, 'category_id');
    }

    public function categories ()
    {
        return $this->hasMany(self::class, 'category_id');
    }
}
