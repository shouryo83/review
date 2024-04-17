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
    
    public function delete(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
