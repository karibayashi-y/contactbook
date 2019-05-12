<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword; 
use Illuminate\Notifications\Messages\MailMessage;

class TextPasswordReset extends Notification
{


    public $token;
  
    public function __construct($token)
    {
      $this->token = $token;
    }
  
    public function via($notifiable)
    {
      return ['mail'];
    }
  
    public function toMail($notifiable)
    {
      return (new MailMessage)
        ->subject(__('パスワードリセット'))
        ->view('emails.reset')
        ->action(__('パスワードリセット'), url('password/reset', $this->token));
    }
}
