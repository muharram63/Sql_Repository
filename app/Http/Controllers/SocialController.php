<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Str;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {

        $provider = 'google';

        $socialUser = Socialite::driver('google')->user();

        $user = User::where('provider', $provider)->where('provider_id', $socialUser->id)->first();

        if (! $user) {

            $user = User::where('email', $socialUser->email)->first();

            if ($user) {

                $user->provider = $provider;
                $user->provider_id = $socialUser->id;
                $user->save();
            } else {

                $user = User::create([
                    'name' => $socialUser->name ?? 'User',

                    'email' => $socialUser->email,

                    'password' => bcrypt(Str::random(16)),

                    'provider' => $provider,

                    'provider_id' => $socialUser->id,

                ]);
            }

        }

        Auth::login($user, true);

        return redirect('/dashboard');
    }
}
