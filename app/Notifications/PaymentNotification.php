<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

use App\Models\User;

class PaymentNotification extends Notification
{
    use Queueable;

    private $payment;
    private $message;

    private $user;
    private $accountant;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment, $message)
    {
        $this->payment = $payment;
        $this->message = $message;

        $this->user = User::select('first_name')
                            ->where('id', $payment['name'])
                            ->first();

        $this->accountant = User::select('email')
                                  ->where('id', $payment['accountant'])
                                  ->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->greeting('Greetings '.$this->user->first_name.', ')
                    ->line(new HtmlString('<p>'.$this->message.'</p><p>Thank you and God Bless.</p>'))
                    ->action('Download Receipt', url('/'))
                    ->line(new HtmlString("For Any Correction and Clarification, kindly contact <a style='text-decoration-line: underline;'>".$this->accountant->email."</a> or visit the Cashier's Office"));
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
