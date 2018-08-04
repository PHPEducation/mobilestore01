<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $guarded = ['id'];
    
    public function imageable ()
    {
        return $this->morphTo();
    }

    public function scopeDeleteImage ($query, $imageable_type, $imageable_id)
    {
        try {
            $image = Image::where('imageable_type', '=', 'App\Product')->where('imageable_id', '=', $imageable_id);
            $image->delete();

            return $image;
        } catch (Exception $e) {
            abort('404');
        }
        
    }
}
