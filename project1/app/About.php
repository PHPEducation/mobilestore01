<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $guarded = ['id'];

    public function scopeCreateAbout ($query, $request)
    {
        About::create([
            'content' => $request->get('content'),
        ]);
    }

    public function scopeUpdateAbout ($query, $request, $id)
    {
        $about = About::findORFail($id);
        $about->content = $request->get('content');
        $about->save();
    }

    public function scopeDeleteAbout($query, $id)
    {
        $about = About::findOrFail($id);
        $about->delete();
    }
}
