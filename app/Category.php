<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function catalog ()
    {
        return $this->belongsTo(self::class, 'category_id');
    }

    public function categories ()
    {
        return $this->hasMany(self::class, 'category_id');
    }

    public function scopeUpdateCategory($query, $arr, $id)
    {
        $category = Category::findOrFail($id);
        $category = Category::update([
            'name' => $arr->get('name'),
            'slug' => Str::slug($arr->get('name')),
            'category_id' => is_numeric($arr->get('catalog')) ? $arr->get('catalog') : null,
        ]);

        return $category;
    }

    public function scopeDeleteCategory($query, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
