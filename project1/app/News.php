<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    //
    protected $table = 'news';
    protected $guarded = ['id'];

    public function categories ()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function reviews ()
    {
        return $this->hasMany('App\Review');
    }
    
    public function images ()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function scopecreateNews ($query, $request)
    {
       
        News::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('title'), '-'),
            'category_id' => $request->get('category'),
        ]);
    }

    public function scopeUpdateNews ($query, $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('title'), '-'),
            'category_id' => $request->get('category'),
        ]);

        return $news;
    }

    public function scopeDeleteNews ($query, $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
    }
}
