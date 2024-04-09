<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    
    protected $fillable = [
        'title',
        'body',
        'artist',
        'festival_id',
        'user_id',
    ];
    
    use HasFactory;
}
