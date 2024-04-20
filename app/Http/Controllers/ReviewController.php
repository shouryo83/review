<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Festival;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Review $review, Like $like)
    {
        return view('reviews.index')->with(['reviews' => $review->getPaginateByLimit(4)]);
    }
    
    public function show(Review $review, Comment $comment, Like $like)
    {
        $like = Like::where('review_id', $review->id)->where('user_id', auth()->user()->id)->first();
        return view('reviews.show', compact('review', 'like'))->with(['review' => $review, 'comments' => $comment->where('review_id', $review->id)->get()]);
    }
    
    public function create(Festival $festival)
    {
        return view('reviews.create')->with(['festivals' => $festival->get()]);
    }
    
    public function store(Review $review, ReviewRequest $request)
    {
        $input =$request['review'];
        $input +=['user_id' => $request->user()->id];
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function edit(Review $review, Festival $festival)
    {
        return view('reviews.edit')->with(['review' => $review, 'festivals' => $festival->get()]);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {
        $input_review =$request['review'];
        $input_review +=['user_id' => $request->user()->id];
        $review->fill($input_review)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
}
