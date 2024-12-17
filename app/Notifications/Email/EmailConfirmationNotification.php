<?php

namespace App\Notifications\Email;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailConfirmationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private bool $withLink = true;

    public function __construct(
        private readonly Email $email,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(): MailMessage
    {
        $message = (new MailMessage())
            ->subject('Подтверждение e-mail')
            ->greeting('Добрый день!')
            ->line("Введите код подтверждения: {$this->email->code}")
            ->line('Thank you for using our application!');
        if ($this->withLink) {
            $url = app_url("email/{$this->email->uuid}/confirm?code={$this->email->code}");
            $message->line('Или нажмите на кнопку ниже')
                ->action('Подтвердить email', $url);
        }
        return $message;
    }

    public function withoutLink(): self
    {
        $this->withLink = false;
        return $this;
    }
}
