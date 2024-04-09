<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class FestivalController extends Controller
{
    public function index(Festival $festival)
    {
        return view('festivals.index')->with(['reviews' => $festival->getByFestival()]);
        return $festival->get();
    }
}
