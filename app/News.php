<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = ['id'];

    public function categories ()
    {
        return $this->belongsTo('App\Category');
    }

    public function reviews ()
    {
        return $this->hasMany('App\Review');
    }
    
    public function images ()
    {
        return $this->morphMany('App\Image', 'imageable')
    }
}
