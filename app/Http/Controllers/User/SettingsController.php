<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        return view('user.settings.index', ['user' => $user]);
    }
}
