<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    // Xác định các kênh thông báo (chỉ email trong trường hợp này)
    public function via($notifiable)
    {
        return ['mail'];
    }

    // Định nghĩa email thông báo
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Yêu cầu đặt lại mật khẩu Admin') // Thêm tiêu đề email
            ->line('Bạn đã yêu cầu đặt lại mật khẩu.')
            ->action('Đặt lại mật khẩu', $this->url)
            ->line('Nếu bạn không yêu cầu điều này, hãy bỏ qua email này.');
    }
}
