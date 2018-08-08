<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $guarded = ['id'];

    public function reviewable ()
    {
        return $this->morphTo();
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeStoreReview($query, $request)
    {
        $review = Review::create([
            'rating' => $request->get('rating'),
            'content' => $request->get('content'),
            'user_id' => $request->get('user_id'),
            'reviewable_id' => $request->get('reviewable_id'),
            'reviewable_type' => $request->get('reviewable_type')
        ]);

        return $review;
    }
}
