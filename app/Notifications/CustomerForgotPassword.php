<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerForgotPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     public $pash;
    public function __construct($pash)
    {
        //
        $this->pash = $pash;
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
        return (new MailMessage)
        ->subject('Yêu cầu đặt lại mật khẩu Admin') // Thêm tiêu đề email
        ->line('Bạn đã yêu cầu đặt lại mật khẩu.')
        ->action('Đặt lại mật khẩu', $this->pash)
        ->line('Nếu bạn không yêu cầu điều này, hãy bỏ qua email này.');
    }

    // /**
    //  * Get the array representation of the notification.
    //  *
    //  * @return array<string, mixed>
    //  */
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }
}
