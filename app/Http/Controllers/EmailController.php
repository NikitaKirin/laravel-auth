<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Enums\EmailStatusEnum;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Notifications\Email\EmailConfirmationNotification;

class EmailController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $user = $request->user();
        if ($user->isEmailConfirmed()) {
            return redirect()->route('user');
        }
        $email = Email::query()->firstOrCreate(
            [
                'user_id' => $user->id,
                'value' => $user->email,
                'status' => EmailStatusEnum::pending,
            ],
        );
        return view('email.confirmation', ['email' => $email]);
    }

    public function send(Request $request, Email $email)
    {
        if (session('email-confirmation-sent')) {
            return back();
        }

        $user = $email->user;
        abort_if($user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        $user->notify(new EmailConfirmationNotification($email));
        session(['email-confirmation-sent' => now()]);
        return back();
    }

    public function confirm(Request $request, Email $email): RedirectResponse
    {
        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        $validator = Validator::make(['code' => $request->input('code')], [
            'code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return to_route('email.confirmation')
                ->withErrors(['code' => $validator->errors()->first()]);
        }

        if ($request->input('code') !== $email->code) {
            return back()->withErrors(['code' => 'Неверный код']);
        }

        $email->user->confirmEmail();
        $email->updateStatus(EmailStatusEnum::completed);
        return redirect()->intended('/user');
    }
}
