<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VoyageEpuise extends Notification
{
    use Queueable;

    public $voyage;

    /**
     * Create a new notification instance.
     */
    public function __construct($voyage)
    {
        $this->voyage = $voyage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'Le voyage ' . $this->voyage->destination . ' est epuise',
            'voyage_id' => $this->voyage->id,
            'voyage_destination' => $this->voyage->destination,
            'voyage_price' => $this->voyage->price,
            'description' => $this->voyage->description,
        ];
    }

}
