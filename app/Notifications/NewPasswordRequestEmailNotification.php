<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPasswordRequestEmailNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $array = [
            'email' => $notifiable->email,
            'subject' => translate('Email Verification'),
            'code' => $notifiable->verification_code,
            'link' => route('accountVerification', ['user_id' => $notifiable->id, 'code' => $notifiable->verification_code])
        ];
        return (new MailMessage)
            ->view('emails.new_password_email_verification', ['array' => $array])
            ->subject(translate('Email Verification - ') . env('APP_NAME'));
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
