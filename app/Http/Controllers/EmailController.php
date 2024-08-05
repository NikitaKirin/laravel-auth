<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Email;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Enums\EmailStatusEnum;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Notifications\Email\EmailConfirmationNotification;

class EmailController extends Controller
{
    public function confirmation(Request $request): View|RedirectResponse
    {
        /**
         * @var User
         */
        $user = $request->user();
        if ($user instanceof User && $user->isEmailConfirmed()) {
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

        /**
         * @var User
         */
        $user = Auth::user();
        abort_if($user->isEmailConfirmed(), 404);

        $user->notify(new EmailConfirmationNotification($email));
        session(['email-confirmation-sent' => now()]);
        return back();
    }

    public function link(Request $request, Email $email)
    {
        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        $email->user->confirmEmail();
        $email->updateStatus(EmailStatusEnum::completed);
        return redirect()->intended('/user');
    }
}
