<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return redirect()->to(route('registration'));
    }
}
