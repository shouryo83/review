<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function getByFestival(int $limit_count = 10)
    {
        return $this->reviews()->with('festival')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'name',
        'date',
    ];
    
    use HasFactory;
}
