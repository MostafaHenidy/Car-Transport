<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Notifications\OrderCancelNotification;
use App\Notifications\OrderCreateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutLineItems()
    {
        $cart = Cart::session()->first();
        $trips = $cart->trips()->get()->map(function ($trip) {
            return [
                'price_data' => [
                    'currency' => env('CASHIER_CURRENCY'),
                    'product_data' => ['name' => $trip->name],
                    'unit_amount' =>  $trip->price,
                    'tax_behavior' => 'exclusive',
                ],
                'adjustable_quantity' => [
                    'enabled' => true,
                    'minimum' => 1,
                    'maximum' => 10,
                ],
                'quantity' => 1,
            ];
        })->toArray();
        return Auth::user()->checkout(null, [
            'success_url' => route('front.checkout.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('front.checkout.checkout.cancel') . '?session_id={CHECKOUT_SESSION_ID}',
            'metadata' => [
                'cart_id' => $cart->id,
            ],
            "allow_promotion_codes" => true,
            'line_items' => $trips,
        ]);
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
            $user = $request->user();
            $cart->delete();
            $user->notify(new OrderCreateNotification($user));
            return redirect()->route('front.index');
        }
    }
    public function cancel(Request $request)
    {
        $session = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        $user = $request->user();
        $user->notify(new OrderCancelNotification($user));
        return redirect()->route('front.index');
    }
}
