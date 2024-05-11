<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'date',
    ];
    
    protected $casts = [
        'date' => 'datetime:Y-m-d', // 確保するために日付形式を指定します。
    ];
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function getByFestival(int $limit_count = 10)
    {
        return $this->reviews()->with('festival')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    

    // 年を取得するアクセサ
    public function getYearAttribute()
    {
        return $this->date->format('Y');
    }

    // 月日を取得するアクセサ
    public function getMonthDayAttribute()
    {
        return $this->date->format('m-d');
    }
}
