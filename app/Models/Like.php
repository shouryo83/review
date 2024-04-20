<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'review_id',
        'user_id',
    ];
    
    public function review()
    {
        return $this->belongsTo(Review::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;
}
