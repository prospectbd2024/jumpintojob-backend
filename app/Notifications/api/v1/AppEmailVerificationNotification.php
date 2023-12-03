<?php

namespace App\Notifications\api\v1;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
//use function App\Notifications\translate;

class AppEmailVerificationNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $array['view'] = 'emails.app_verification';
        $array['subject'] = translate('Email Verification');
        $array['content'] = translate('Please enter the code:'.$notifiable->verification_code);
        $array['email'] = $notifiable->email;
        $array['code'] = $notifiable->verification_code;

        return (new MailMessage)
            ->view('emails.app_verification', ['array' => $array])
            ->subject(translate('Email Verification - ').env('APP_NAME'));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

}
