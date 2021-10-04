<?php

namespace App\Notifications;

use App\Models\CustomTenant;
use Illuminate\Bus\Queueable;
use App\Services\MailService;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends ResetPassword
{
    use Queueable;

    private $url;
    private $username;
    private $mailService;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($url, $username)
    {
        $this->url = $url;
        $this->username = $username;
        $this->mailService = new MailService();
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
        $tenant = CustomTenant::current();

        /* $params = [
            "template"  => 22,
            "subject"   => "Restaurar Contraseña",
            "view"      => "mails.reset-password",
            "to" => array(
                ["name" => NULL, "email" => $notifiable->getEmailForPasswordReset()]
            ),
            "params" => [
                "USERNAME" => $this->username,
                "LINK"     => $this->url . '?email=' . $notifiable->getEmailForPasswordReset(),
                "TENANT"   => $tenant->name,
                "EMAIL"    => $notifiable->getEmailForPasswordReset(),
            ],
        ];
        return $this->mailService->SendEmail($params); */

        return (new MailMessage)->view('mails.reset-password', [
            "USERNAME" => $this->username,
            "LINK"     => $this->url . '?email=' . $notifiable->getEmailForPasswordReset(),
            "TENANT"   => $tenant->name,
            "EMAIL"    => $notifiable->getEmailForPasswordReset(),
        ]);
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
