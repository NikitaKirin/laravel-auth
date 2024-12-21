<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Supports\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TwoFAController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        if (is_null($user->getGoogleConfirmationSecret())) {
            $user->generateSecretKey();
        }
        return view(
            'user.settings.2fa.index',
            [
                'qrCode' => (new QrCode($user->getQRCodeUrl()))->generate(),
                'confirmationEnabled' => $user->isGoogleConfirmationEnabled(),
            ],
        );
    }

    public function enable(Request $request)
    {
        $user = Auth::user();
        abort_if($user->isGoogleConfirmationEnabled(), 403);

        $validated = $request->validate([
            'code' => 'required|string',
        ]);

        if (!$user->verifyCode($validated['code'])) {
            return back()->withErrors([
                'code' => 'Неверный код',
            ]);
        }

        $user->activateGoogleConfirmation();

        return redirect()->to('/user');
    }

    public function disable(Request $request)
    {
        $user = Auth::user();
        abort_unless($user->isGoogleConfirmationEnabled(), 403);

        $validated = $request->validate([
            'code' => 'required|string',
        ]);

        if (!$user->verifyCode($validated['code'])) {
            return back()->withErrors([
                'code' => 'Неверный код',
            ]);
        }

        $user->inactivateGoogleConfirmation();

        return redirect()->to('/user');
    }
}
