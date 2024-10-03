<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen =[NewCustomerHasRegisteredEvent::class=>[
        \App\Listeners\WelcomeNewCustomerListener::class,
        //It give the ability to remove Listener when ever we want
        \App\Listeners\RegisterCustomerToNewsletter::class,
        \App\Listeners\NotifyAdminViaSlack::class,
    ]];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
