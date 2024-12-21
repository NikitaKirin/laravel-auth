<?php

namespace App\Http\Controllers;

use App\Enums\LoginAttemptStatusEnum;
use App\Http\Requests\LoginRequest;
use App\Models\LoginAttempt;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use PragmaRX\Google2FA\Exceptions\InvalidCharactersException;
use PragmaRX\Google2FA\Exceptions\SecretKeyTooShortException;

class LoginController extends Controller
{
    public function store(LoginRequest $request): RedirectResponse
    {
        $data = $request->only(['email', 'password']);
        $loginStatus = Auth::validate($data);
        /** @var User|null $lastAttemptedUser */
        $lastAttemptedUser = Auth::getLastAttempted();
        $loginAttempt = LoginAttempt::createFromRequest($request);
        $loginAttempt->user_id = $lastAttemptedUser?->id;

        if (!$loginStatus) {
            $loginAttempt->status = LoginAttemptStatusEnum::failed;
            $loginAttempt->save();
            return back()->withErrors([
                'email' => 'Неверный email или пароль',
            ])->onlyInput('email');
        }

        if ($lastAttemptedUser->isGoogleConfirmationEnabled()) {
            $loginAttempt->status = LoginAttemptStatusEnum::confirmation;
            $loginAttempt->save();
            return Redirect::route('login.confirmation', compact('loginAttempt'));
        }

        $loginAttempt->status = LoginAttemptStatusEnum::success;
        $loginAttempt->save();

        Auth::login($lastAttemptedUser, $loginAttempt->remember);
        $request->session()->regenerate();

        return redirect()->intended('/user');
    }

    /**
     * @throws IncompatibleWithGoogleAuthenticatorException
     * @throws InvalidCharactersException
     * @throws SecretKeyTooShortException
     */
    public function confirm(Request $request, LoginAttempt $loginAttempt): RedirectResponse
    {
        abort_unless($loginAttempt->status->is(LoginAttemptStatusEnum::confirmation), 403);

        $request->validate([
            'code' => 'required|string',
        ]);

        if (!$loginAttempt->user?->verifyCode($request->input('code'))) {
            return Redirect::back()->withErrors([
                'code' => 'Неверный код'
            ]);
        }

        Auth::login($loginAttempt->user, $loginAttempt->remember);

        return Redirect::intended('/user');
    }
}
