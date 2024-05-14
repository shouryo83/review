<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\Review;

class FestivalController extends Controller
{
    public function index(Festival $festival)
    {
        return view('festivals.index')->with(['reviews' => $festival->getByFestival(2), 'festival' => $festival]);
    }
    
    public function getDatesByYear($name, $year)
    {
        $festivals = Festival::where('name', $name)
                             ->whereYear('date', $year)
                             ->get(['id', 'date']) // idと日付を取得
                             ->map(function ($festival) {
                                 return [
                                     'id' => $festival->id,
                                     'date' => $festival->date->format('Y-m-d') // 日付をフォーマット
                                 ];
                             });

        return response()->json($festivals);
    }
}
