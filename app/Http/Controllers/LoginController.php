<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->only(['email', 'password']);

        if (!Auth::attempt($data, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Неверный email или пароль',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended('/user');
    }
}
