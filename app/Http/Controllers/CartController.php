<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Laravel\Cashier\Cashier;

class CartController extends Controller
{
    public function index()
    {
        return view('front.cart');
    }
    public function addToCart(Trips $trip)
    {
        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId(),
        ]);
        $cart->trips()->syncWithoutDetaching($trip);
        return redirect()->back();
    }
    public function removeFromCart(Trips $trip)
    {
        $cart = Cart::session()->first();
        abort_unless($cart, 404);
        $cart->trips()->detach($trip);
        return redirect()->back();
    }
}
