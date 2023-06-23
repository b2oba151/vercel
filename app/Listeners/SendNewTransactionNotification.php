<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\NewTransactionEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\CreationTransactionNotification;

class SendNewTransactionNotification
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
    public function handle(NewTransactionEvent $event): void
    {
        $transaction = $event->transaction;
        $envoyeur= Auth()->user();
        if($envoyeur->location=='mali'){
            $lieux='maroc';
        }elseif($envoyeur->location=='maroc'){
            $lieux='mali';
        }

        $users = User::where('location',$lieux)->get();

    $notification = new CreationTransactionNotification($transaction);

    foreach ($users as $user) {
        $user->notify($notification);
    }
    }
}
