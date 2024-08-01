<?php

namespace App\Http\Controllers;

use App\Actions\Email\SendConfirmationNotificationAction;
use App\Enums\EmailStatusEnum;
use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

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

        (new SendConfirmationNotificationAction($user))->run();
        return view('email.confirmation');
    }

    public function send(Request $request)
    {
        if (session('email-confirmation-sent')) {
            return back();
        }

        /**
         * @var User
         */
        $user = Auth::user();
        abort_if($user->isEmailConfirmed(), 404);

        (new SendConfirmationNotificationAction($user))->run();
        session(['email-confirmation-sent' => now()]);
        return back();
    }

    public function confirm(Request $request, Email $email)
    {
        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        $email->user->confirmEmail();
        $email->updateStatus(EmailStatusEnum::completed);
        return redirect()->intended('/user');
    }
}
