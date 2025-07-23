<?php

namespace App\Http\Controllers\SupportStaffAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('supportStuffCustomAuth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate('support_stuff');
        $request->session()->regenerate();
        return redirect()->intended(route('support_stuff.index'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('support_stuff')->user()->last_login_at = now();
        Auth::guard('support_stuff')->logout();
        $request->session()->forget('support_stuff_login');
        $request->session()->regenerateToken();
        return redirect()->route('support_stuff.login');
    }
}
