<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
=======
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
<<<<<<< HEAD
        Registered::class => [
            SendEmailVerificationNotification::class,
=======
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ],
    ];

    /**
<<<<<<< HEAD
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
=======
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        //
    }
}
