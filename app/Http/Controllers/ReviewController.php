<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Festival;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
        return view('reviews.index')->with(['reviews' => $review->getPaginateByLimit(2)]);
    }
    
    public function show(Review $review)
    {
        return view('reviews.show')->with(['review' => $review]);
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
    
    public function edit(Review $review)
    {
        return view('reviews.edit')->with(['review' => $review]);
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
