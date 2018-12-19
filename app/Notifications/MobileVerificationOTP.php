<?php

namespace App\Notifications;

use Bitfumes\KarixNotificationChannel\KarixChannel;
use Bitfumes\KarixNotificationChannel\KarixMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MobileVerificationOTP extends Notification
{
    use Queueable;

    public $OTP;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($OTP)
    {
        $this->OTP=$OTP;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [KarixChannel::class];
    }

    public function toKarix($notifiable)
    {
        return KarixMessage::create()
            //->to('+917497926417')
            ->from('+917565097233')
            //->content('This is test OTP sms-7867');
            ->content("Your mobile verification (OTP) is {$this->OTP}");
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
