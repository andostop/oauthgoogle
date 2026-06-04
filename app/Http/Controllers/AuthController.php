<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->scopes([
                'openid',
                'profile',
                'email'
            ])
            ->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        return response()->json([
            'googleId' => $googleUser->getId(),
            'nombre' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'foto' => $googleUser->getAvatar()
        ]);
    }
}