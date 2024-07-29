<?php

namespace App\Http\Controllers;

use App\Events\User\UserCreatedEvent;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        event(new UserCreatedEvent($user));
        
        Auth::login($user);
        return redirect()->intended('/user');
    }
}
