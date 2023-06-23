<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreationTransactionNotification    extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;

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

        $url = URL::route('transactions.show', ['transaction' => $this->transaction]);
        return (new MailMessage)
        ->subject('Nouvelle Transaction effectuée')
        ->markdown('emails.creation-transaction', [
            'transaction' => $this->transaction,
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
        $url = URL::route('transactions.show', ['transaction' => $this->transaction]);
        return [
            'id' => $this->transaction->id,
            'nom' => $this->transaction->nom,
            'prenom' => $this->transaction->prenom,
            'envoye' => $this->transaction->envoye,
            'recu' => $this->transaction->recu,
            'frais' => $this->transaction->frais,
            'taux' => $this->transaction->taux,
            'charges' => $this->transaction->charges,
            'description' => $this->transaction->description,
            'url'=>$url,
            'date_de_creation' => $this->transaction->created_at,
        ];
    }
}
