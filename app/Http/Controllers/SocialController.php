<?php

namespace App\Http\Controllers;

use App\Enums\SocialDriverEnum;
use App\Models\Social;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(SocialDriverEnum $driver): RedirectResponse
    {
        Session::put('previousUrl', url()->previous(fallback: route('login')));
        return Socialite::driver($driver->value)->redirect();
    }

    public function callback(SocialDriverEnum $driver): RedirectResponse
    {
        try {
            $githubUser = Socialite::driver($driver->value)->user();
        } catch (Exception $e) {
            report($e);
            return redirect()->to(Session::get('previousUrl'));
        }

        $social = Social::query()->firstOrCreate([
            'driver' => $driver->value,
            'driver_id' => $githubUser->getId(),
        ]);
        if (is_null($social->user_id)) {
            $user = User::create(['password' => Str::random(12)]);
            $social->user()->associate($user)->save();
        }
        Auth::login($social->user);
        return redirect()->intended(route('user.settings'));
    }
}
