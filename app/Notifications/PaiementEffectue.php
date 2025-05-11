<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Paiement;

class PaiementEffectue extends Notification
{
    use Queueable;

    public $paiement;

    public function __construct(Paiement $paiement)
    {
        $this->paiement = $paiement;
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
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'Un nouveau paiement a été effectué',
            'type' => 'paiement',
            'amount' => $this->paiement->amount,
            'method' => $this->paiement->method,
        ];
    }
}
