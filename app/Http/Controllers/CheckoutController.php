<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = Cart::session()->first();
        if ($cart) {
            $prices = $cart->trips->pluck('strip_price_id')->toArray();
            return Auth::user()->checkout($prices, [
                'success_url' => route('front.checkout.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('front.checkout.checkout.cancel') . '?session_id={CHECKOUT_SESSION_ID}',
                'metadata' => [
                    'cart_id' => $cart->id,
                ],
            ]);
        }
    }
    public function success(Request $request)
    {
        $session = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        if ($session->payment_status == 'paid') {
            $cart = cart::findOrFail($session->metadata->cart_id);
            $order = Order::create([
                'user_id' => $request->user()->id,
            ]);
            $order->trips()->attach($cart->trips->pluck('id')->toArray());
            $cart->delete();
            return redirect()->route('front.index', ['message' => 'Order Placed!']);
        }
    }
    public function cancel(Request $request)
    {
        $session = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
    }
}
