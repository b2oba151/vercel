<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ModificationTransactionNotification    extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $transaction;
    public $transaction_old;
    public function __construct(Transaction $transaction,Transaction $transaction_old)
    {
        $this->transaction = $transaction;
        $this->transaction_old = $transaction_old;
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
        ->subject('La Transaction a été modifiée')
        ->markdown('emails.modification-transaction', [
            'transaction' => $this->transaction,
            'transaction_old' => $this->transaction_old,
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
