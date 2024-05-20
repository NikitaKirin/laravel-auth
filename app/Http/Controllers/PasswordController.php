<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\StoreRequest;
use App\Models\User;
use App\Notifications\Password\ConfirmationNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function store(StoreRequest $request): RedirectResponse
    {
        $email = $request->input('email');
        /** @var User $user */
        $user = User::query()
            ->where(compact('email'))
            ->first();
        $user?->notify(new ConfirmationNotification());
        return to_route('password.confirm');
    }

    public function update(Request $request, string $code): RedirectResponse
    {
        return to_route('login');
    }
}
