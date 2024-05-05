<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\Review;

class FestivalController extends Controller
{
    public function index(Festival $festival)
    {
        $festivals = Festival::select('name', DB::raw('YEAR(date) as year'))
                             ->groupBy('name', 'year')
                             ->orderBy('name')
                             ->orderBy('year')
                             ->get();
        return view('festivals.index', compact('festivals'));

        // return view('festivals.index')->with(['reviews' => $festival->getByFestival(), 'festival' => $festival]);
    }
    
    public function edit(Festival $festival)
    {
        
    }
}
