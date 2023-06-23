<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\DeleteTransactionEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\SuppressionTransactionNotification;

class SendDeleteTransactionNotificationListener
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
    public function handle(DeleteTransactionEvent $event): void
    {
        $transaction = $event->transaction;
        $envoyeur= Auth()->user();
        if($envoyeur->location=='mali'){
            $lieux='maroc';
        }elseif($envoyeur->location=='maroc'){
            $lieux='mali';
        }

        $users = User::where('location',$lieux)->get();

    $notification = new SuppressionTransactionNotification($transaction);

    foreach ($users as $user) {
        $user->notify($notification);
    }
    }
}
