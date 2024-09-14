<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Person;

class NewContact extends Notification implements ShouldQueue
{
    use Queueable;

    protected $person;
    protected $uncryptedpassword;

    /**
     * Create a new notification instance.
     */
    public function __construct(Person $person, $uncryptedpassword)
    {
        $this->person = $person;
       $this->uncryptedpassword = $uncryptedpassword;
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
                    ->line('Seja Bem-Vindo!')
                    ->line('Seu cadastro na TSN Logística foi permitido.')
                    ->line('Para acessar sua conta, use a senha:')
                    ->line($this->uncryptedpassword);
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

    public function routeNotificationForMail()
    {
        return $this->person->email;
    }
}
