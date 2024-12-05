<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerForgotPasswordNoti extends Notification implements ShouldQueue
{
    use Queueable;

    public $path;
    /**
     * Create a new notification instance.
     */
    public function __construct($path)
    {
        //
        $this->path= $path;
    }

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
        ->subject('Yêu cầu đặt lại mật khẩu người dùng') // Thêm tiêu đề email
        ->line('Bạn đã yêu cầu đặt lại mật khẩu.')
        ->action('Đặt lại mật khẩu', $this->path)
        ->line('Nếu bạn không yêu cầu điều này, hãy bỏ qua email này.');
    }
}
