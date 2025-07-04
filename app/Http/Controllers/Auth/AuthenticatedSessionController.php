<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('customAuth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $cart = Cart::session()->first();
        $request->authenticate();

        $request->session()->regenerate();
        if ($cart) {
            $cart->update([
                'session_id' => session()->getId(),
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect()->intended(route('front.index'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $cart = Cart::session()->first();
        Auth::guard('web')->logout();

        // $request->session()->invalidate();
        $request->session()->forget('user_login');


        $request->session()->regenerateToken();
        if ($cart) {
            $cart->delete();
        }
        return redirect('/');
    }
}
