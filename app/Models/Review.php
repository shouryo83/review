<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('festival')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function festival()
    {
        return $this->belongsTo(Festival::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'review_id');
    }
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        
        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        }   else {
            return false;
        }
    }
    
    protected $fillable = [
        'title',
        'body',
        'artist',
        'festival_id',
        'user_id',
    ];
    
    use HasFactory;
}
