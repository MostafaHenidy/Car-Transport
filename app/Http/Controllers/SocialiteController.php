<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function githubLogin()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        $socialiteUser = Socialite::driver('github')->user();
        $user = User::updateOrCreate(
            [
                'provider_id' => $socialiteUser->getId(),
            ],
            [
                'name' => $socialiteUser->getNickName(),
                'email' => $socialiteUser->getEmail(),
                'password' => Hash::make(Str::random(24)),
                'avatar' => $socialiteUser->getAvatar(),
                'provider_name' => 'github',
            ]
        );
        $user->assignRole('user');
        Auth::login($user, true);
        return redirect()->route('front.index');
    }
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect()
    {
        $socialiteUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate(
            [
                'provider_id' => $socialiteUser->getId(),
            ],
            [
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'password' => Hash::make(Str::random(24)),
                'avatar' => $socialiteUser->getAvatar(),

                'provider_name' => 'google',
            ]
        );
        $user->assignRole('user');
        Auth::login($user, true);
        return redirect()->route('front.index');
    }
}
