<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EmailController extends Controller
{
    public function confirmation(Request $request): View|RedirectResponse
    {
        $user = $request->user();
        if ($user instanceof User && $user->isEmailConfirmed()) {
            return redirect()->route('user');
        }
        return view('email.confirmation');
    }
}
