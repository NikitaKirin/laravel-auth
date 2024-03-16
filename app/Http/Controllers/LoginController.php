<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return back()->withErrors([
                'email' => 'Неверный email или пароль',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->to(route('login'));
    }
}
