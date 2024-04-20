<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request, Like $like, Review $review)
    {
        $like->review_id = $review->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }
    
    public function unlike(Request $request, Review $review)
    {
        $user = Auth::user()->id;
        $like = Like::where('review_id', $review->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }
}
