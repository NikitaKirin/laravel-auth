<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Profile\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('user.settings.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        $data = $request->only([
            'first_name',
            'middle_name',
            'last_name',
            'gender',
        ]);

        $request->user()->update($data);

        return to_route('user.settings');
    }
}
