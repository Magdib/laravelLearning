<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener implements ShouldQueue
{
    public function handle(NewCustomerHasRegisteredEvent $event): void
    {
       sleep(10);
     Mail::to($event->customer->email)->send(new WelcomeNewUserMail());  
    }
}
