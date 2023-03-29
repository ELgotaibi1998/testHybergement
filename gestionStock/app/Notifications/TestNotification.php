<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification
{
    use Queueable;
    public $article;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->article=$user;
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
            "article"=>$this->article->designation,
            "qteStock"=>$this->article->qteStock,
            "articleD"=>$this->article->article_id,
            "user"=>$this->article->user_id,
            "demandeurP"=>$this->article->personne_id,
            "demandeurS"=>$this->article->salle_id,
        ];
    }
}
