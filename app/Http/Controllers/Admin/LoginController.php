<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::guard('admin')->attempt($validated)) {
            return redirect()->back()
                ->withErrors(['email' => 'Неверный логин или пароль'])
                ->onlyInput('email');
        }

        return redirect()->intended(route('admin.dashboard'));
    }
}
