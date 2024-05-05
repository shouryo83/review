<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Festival;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
        return view('reviews.index')->with(['reviews' => $review->getPaginateByLimit(4)]);
    }
    
    public function show(Review $review, Comment $comment)
    {
        return view('reviews.show')->with(['review' => $review, 'comments' => $comment->where('review_id', $review->id)->get()]);
    }
    
    public function create(Festival $festival)
    {
        $festivals = Festival::select('name', DB::raw('YEAR(date) as year'))
                        ->groupBy('name', 'year')
                        ->orderBy('name')
                        ->orderBy('year')
                        ->get();
        return view('reviews.create', compact('festivals'));
    }
    
    public function getDates(Request $request)
    {
        $name = $request->input('name');
        $year = $request->input('year');
        $dates = Festival::where('name', $name)
                         ->whereYear('date', $year)
                         ->orderBy('date')
                         ->get();
        return response()->json($dates);
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
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        Like::create([
            'review_id' => $id,
            'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'You Liked the Review.');
        
        return back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('review_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        
        session()->flash('success', 'You Unliked the Review.');
        
        return back();
    }
}
