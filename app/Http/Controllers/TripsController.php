<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripsController extends Controller
{
    public function index()
    {
        $trips = Trips::all();
        $reviews = Review::where('approved', 1)->take(3)->get();
        return view('front.index', get_defined_vars());
    }
    public function storeReview(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:1000',
        ]);
        Review::create($validated);
        return redirect()->back();
    }
}
