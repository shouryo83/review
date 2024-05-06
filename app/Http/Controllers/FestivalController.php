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
}
