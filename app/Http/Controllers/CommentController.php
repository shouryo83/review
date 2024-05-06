<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Comment;
use App\Models\User;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment, Review $review)
    {
        $comment->comment = $request->comment;
        $comment->review_id = $review->id;
        $comment->user_id = $request->user()->id;
        $comment->save();
        return redirect('/reviews/' . $review->id)->with(['comment' => $comment]);
    }
    
    public function delete(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back();
    }
    
    public function edit(Comment $comment, Review $review)
    {
        $this->authorize('edit', $comment);
        return view('comments.edit')->with(['comment' => $comment, 'review' => $review]);
    }
    
    public function update(CommentRequest $request, Comment $comment, Review $review)
    {
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/reviews/' . $comment->review->id)->with(['comment' => $comment]);
    }
}
