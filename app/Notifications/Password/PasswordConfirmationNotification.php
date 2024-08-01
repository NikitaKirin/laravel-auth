<?php

namespace App\Notifications\Password;

use App\Models\User;
use App\Models\Password;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordConfirmationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly Password $password,
    )
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(User $notifiable): MailMessage
    {
        $url = app_url("password/{$this->password->uuid}");
        return (new MailMessage())
            ->subject('Изменение пароля')
            ->greeting('Добрый день!')
            ->line('Для изменения пароля нажмите на кнопку ниже')
            ->action('Изменить пароль', $url)
            ->line('Thank you for using our application!');
    }
}
