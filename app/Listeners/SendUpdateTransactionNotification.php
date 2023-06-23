<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\UpdateTransactionEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ModificationTransactionNotification;

class SendUpdateTransactionNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateTransactionEvent $event): void
    {
        $transaction = $event->transaction;
        $transaction_old = $event->transaction_old;

        $envoyeur= Auth()->user();
        if($envoyeur->location=='mali'){
            $lieux='maroc';
        }elseif($envoyeur->location=='maroc'){
            $lieux='mali';
        }

        $users = User::where('location',$lieux)->get();

        $notification = new ModificationTransactionNotification($transaction,$transaction_old);
    foreach ($users as $user) {
        $user->notify($notification);
    }
    }
}
