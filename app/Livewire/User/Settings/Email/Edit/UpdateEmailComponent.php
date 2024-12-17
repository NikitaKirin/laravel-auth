<?php

namespace App\Livewire\User\Settings\Email\Edit;

use App\Enums\EmailStatusEnum;
use App\Models\Email;
use App\Models\User;
use App\Notifications\Email\EmailConfirmationNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UpdateEmailComponent extends Component
{
    private array $steps = ['update', 'confirm'];
    public string $currentStep = 'update';

    public string $email = '';

    public string $uuid = '';

    public string $code = '';

    public function render(): View
    {
        return view('livewire.user.settings.email.edit.update-email-component');
    }

    #[Computed]
    public function user(): User
    {
        return Auth::user();
    }

    public function update(): void
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $email = Email::query()->create([
            'value' => $this->email,
            'user_id' => $this->user->id,
            'status' => EmailStatusEnum::pending,
        ]);
        $this->uuid = $email->uuid;
        $mailMessage = (new EmailConfirmationNotification($email))->withoutLink();
        Notification::route('mail', $this->email)
            ->notify($mailMessage);
        $this->currentStep = 'confirm';
    }

    public function confirm(): void
    {
        $this->validate([
            'code' => 'required|string',
        ]);

        $email = Email::query()
            ->where('uuid', $this->uuid)
            ->where('status', EmailStatusEnum::pending)
            ->where('user_id', $this->user->id)
            ->first();

        if (is_null($email)) {
            throw ValidationException::withMessages([
                'code' => 'Заявка не найдена'
            ]);
        }

        if ($email->code !== $this->code) {
            throw ValidationException::withMessages([
                'code' => 'Неверный код',
            ]);
        }

        $email->complete();
        $this->user->updateEmail($this->email);
        $this->user->confirmEmail();

        $this->redirect(
            route('user.settings'),
            true,
        );
    }
    public function setStep(string $step): void
    {
        if (in_array($step, $this->steps)) {
            $this->currentStep = $step;
        }
    }
}
