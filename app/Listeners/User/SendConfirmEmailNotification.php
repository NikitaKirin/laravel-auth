<?php

namespace App\Listeners\User;

use App\Enums\EmailStatusEnum;
use App\Events\User\UserCreatedEvent;
use App\Models\Email;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmEmailNotification implements ShouldQueue
{

    public function handle(UserCreatedEvent $event): void
    {
        if ($event->user->isEmailConfirmed()) {
            return;
        }

        $email = Email::query()->create([
            'value' => $event->user->email,
            'user_id' => $event->user->id,
            'status' => EmailStatusEnum::pending,
        ]);
        
        dd($email);
    }
}
