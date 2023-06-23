<?php

namespace App\Notifications;

use App\Models\Variation;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreationVariationNotification    extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $variation;

    public function __construct(Variation $variation)
    {
        $this->variation = $variation;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = URL::route('variations.show', ['variation' => $this->variation]);
        return (new MailMessage)
        ->subject('Nouvelle Variation effectuée')
        ->markdown('emails.creation-variation', [
            'variation' => $this->variation,
            'url' => $url,
            'recepteur_user' =>$notifiable,
        ]);
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $url = URL::route('variations.show', ['variation' => $this->variation]);
        return [
            'id' => $this->variation->id,
            'avant' => $this->variation->avant,
            'apres' => $this->variation->apres,
            'variation' => $this->variation->variation,
            'url'=>$url,
            'date_de_creation' => $this->variation->created_at,
        ];
    }
}
