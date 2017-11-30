<?php

namespace App\Notifications\Users;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MigratedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->success()
                    ->subject('PHPMap is now on v3!')
                    ->greeting('Hey, '.$this->user->username)
                    ->line('We just wanted to let you know, that you have been migrated to v3 of PHPMap..')
                    ->line('')
                    ->action('Show me v3!', url('/'))
                    ->line('In case of having trouble with your login, please reset you password.')
                    ->line('Thank you for using '.env('APP_NAME').'!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Welcome to PHPMap v3!',
            'message' => 'You have been succesfully migrated to v3.',
            'action_link' => null
        ];
    }
}
