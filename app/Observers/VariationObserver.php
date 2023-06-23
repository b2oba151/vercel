<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Variation;
use App\Notifications\CreationVariationNotification;

class VariationObserver
{
    /**
     * Handle the Variation "created" event.
     */
    public function created(Variation $variation): void
    {
        $envoyeur= Auth()->user();
        if($envoyeur->location=='mali'){
            $lieux='maroc';
        }elseif($envoyeur->location=='maroc'){
            $lieux='mali';
        }

        $users = User::where('location',$lieux)->get();

    $notification = new CreationVariationNotification($variation);

    foreach ($users as $user) {
        $user->notify($notification);
    }
    }

    /**
     * Handle the Variation "updated" event.
     */
    public function updated(Variation $variation): void
    {
        //
    }

    /**
     * Handle the Variation "deleted" event.
     */
    public function deleted(Variation $variation): void
    {
        //
    }

    /**
     * Handle the Variation "restored" event.
     */
    public function restored(Variation $variation): void
    {
        //
    }

    /**
     * Handle the Variation "force deleted" event.
     */
    public function forceDeleted(Variation $variation): void
    {
        //
    }
}
