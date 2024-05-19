<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        return to_route('password.confirm');
    }

    public function update(Request $request, string $code): RedirectResponse
    {
        return to_route('login');
    }
}
