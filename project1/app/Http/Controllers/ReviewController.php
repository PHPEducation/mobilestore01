<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewFormRequest;
use Auth;
use App\Review;

class ReviewController extends Controller
{
    public function store (ReviewFormRequest $request)
    {
        if($request->ajax()) {
            $review = Review::storeReview($request);
            $user = Auth::user()->name;
            $review['user'] = $user;

            return response()->json($review);
        }

    }
}
