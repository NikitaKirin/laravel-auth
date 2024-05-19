<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Settings\Password\UpdateRequest;

class PasswordController extends Controller
{
    public function edit(): View
    {
        return view('user.settings.password.edit');
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();
        $user->updatePassword($request->input('password'));
        return to_route('user.settings');
    }
}
