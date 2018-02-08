<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    // redirection to facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Get user info
    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->user();
        
        // User exist?
        if ($user = User::where('email', $social_user->email)->first()) {
            return $this->authAndRedirect($user); // Login y redirección
        } else {
            // if doesnot exist create user.
            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
            ]);

            return $this->authAndRedirect($user); // Login y redirección
        }
    }

    // Login and redirection
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/login');
    }
}
