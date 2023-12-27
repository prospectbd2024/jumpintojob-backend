<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserEmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private mixed $user;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
       //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $array['email'] = $notifiable->email;
        $array['subject'] = translate('Email Verification');
        $array['code'] = $notifiable->verification_code;
        $array['link'] = route('accountVerification', ['user_id' => $notifiable->id, 'code' => $notifiable->verification_code]);

        return (new MailMessage)
            ->view('emails.app_verification', ['array' => $array])
            ->subject(translate('Email Verification - ').get_setting('site_name'));
    }
}
