<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Voyage;

class NouveauVoyage extends Notification
{
    use Queueable;

    public $voyage;

    /**
     * Create a new notification instance.
     */
    public function __construct(Voyage $voyage)
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
            'message' => 'Un nouveau voyage a ete ajoute',
            'voyage_id' => $this->voyage->id,
            'voyage_destination' => $this->voyage->destination,
            'voyage_price' => $this->voyage->price,
            'description' => $this->voyage->description,
        ];
    }

}
