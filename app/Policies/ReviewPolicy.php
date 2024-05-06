<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function delete(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
    
    public function edit(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
}
