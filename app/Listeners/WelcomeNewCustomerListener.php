<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener
{
    public function handle(NewCustomerHasRegisteredEvent $event): void
    {
       
     Mail::to($event->customer->email)->send(new WelcomeNewUserMail());  
    }
}
