<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;
   public $demande;
    /**
     * Create a new notification instance.
     */
    public function __construct($demande)
    {
        $this->demande=$demande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable): array
    {
        return ['database'];
    }
    public function toArray(object $notifiable): array
    {
        return [
            "article"=>$this->demande->article_id,
            "user"=>$this->demande->user_id,
            "demandeurP"=>$this->demande->personne_id,
            "demandeurS"=>$this->demande->salle_id,
        ];
    }
}
