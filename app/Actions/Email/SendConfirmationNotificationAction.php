<?php

namespace App\Actions\Email;

use App\Models\User;
use App\Models\Email;
use App\Enums\EmailStatusEnum;
use App\Notifications\Email\EmailConfirmationNotification;

class SendConfirmationNotificationAction
{
    private Email $email;
    public function __construct(
        private readonly User $user,
    ) {
        $this->email = Email::query()->firstOrCreate(
            [
                'user_id' => $this->user->id,
                'value' => $this->user->email,
                'status' => EmailStatusEnum::pending,
            ],
        );
    }

    public function run()
    {
        $this->user->notify(new EmailConfirmationNotification($this->email));
    }
}