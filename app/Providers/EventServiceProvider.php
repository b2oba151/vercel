<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Variation;
use App\Events\NewTransactionEvent;
use App\Observers\VariationObserver;
use Illuminate\Support\Facades\Event;
use App\Events\DeleteTransactionEvent;
use App\Events\UpdateTransactionEvent;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendNewTransactionNotification;
use App\Listeners\SendUpdateTransactionNotification;
use App\Listeners\SendDeleteTransactionNotificationListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewTransactionEvent::class => [SendNewTransactionNotification::class,],
        UpdateTransactionEvent::class => [SendUpdateTransactionNotification::class,],
        DeleteTransactionEvent::class => [SendDeleteTransactionNotificationListener::class,],
    ];
/**
 * The model observers for your application.
 *
 * @var array
 */
protected $observers = [
    Variation::class => [VariationObserver::class],
];
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //Variation::observe(VariationObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
