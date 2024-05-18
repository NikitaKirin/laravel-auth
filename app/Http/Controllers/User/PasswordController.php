<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Settings\Password\UpdateRequest;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('user.settings.password.edit');
    }

    public function update(UpdateRequest $request)
    {
        /** @var User */
        $user = $request->user();
        $user->updatePassword($request->input('password'));
        return to_route('user.settings');
    }
}
