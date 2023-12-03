<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\Factory as Queue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserEmailVerification extends Notification implements \Illuminate\Contracts\Mail\Mailable
{
    use Queueable;

    private mixed $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        $array['email'] = $this->user->email;
        $array['subject'] = translate('Email Verification');
        $array['code'] = $this->user->verification_code;
        $array['link'] = route('accountVerification', ['user_id' => $this->user->id, 'code' => $this->user->verification_code]);

        return (new MailMessage)
            ->view('emails.app_verification', ['array' => $array])
            ->subject(translate('Email Verification - ').get_setting('site_name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function send($mailer)
    {
        // TODO: Implement send() method.
    }

    public function queue(Queue $queue)
    {
        // TODO: Implement queue() method.
    }

    public function later($delay, Queue $queue)
    {
        // TODO: Implement later() method.
    }

    public function cc($address, $name = null)
    {
        // TODO: Implement cc() method.
    }

    public function bcc($address, $name = null)
    {
        // TODO: Implement bcc() method.
    }

    public function to($address, $name = null)
    {
        // TODO: Implement to() method.
    }

    public function mailer($mailer)
    {
        // TODO: Implement mailer() method.
    }
}
