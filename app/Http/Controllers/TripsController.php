<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripsController extends Controller
{
    public function index()
    {
        $trips = Trips::all();
        return view('front.index', get_defined_vars());
    }
}
