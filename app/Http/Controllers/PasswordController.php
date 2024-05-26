<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\UpdateRequest;
use App\Models\User;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Password\StoreRequest;
use App\Notifications\Password\ConfirmationNotification;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

    public function edit(Password $password)
    {
        return view('password.edit', ['password' => $password]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $email = $request->input('email');
        $ip = $request->ip();
        /** @var User $user */
        $user = User::query()
            ->where(compact('email'))
            ->first();

        $password = Password::create(compact('email', 'ip') + ['user_id' => $user?->id]);
        $user?->notify(new ConfirmationNotification($password));
        return to_route('password.confirm');
    }

    public function update(UpdateRequest $request, Password $password): RedirectResponse
    {
        abort_unless($password->user_id, 404);

        /** @var User $user */
        $user = $password->user;

        $user->updatePassword($request->input('password'));

        Auth::login($user);
        return to_route('user.settings');
    }
}
