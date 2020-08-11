<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendOrderEmail;
use App\Jobs\SendMailToAdmin;

class OrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        dispatch(new SendOrderEmail($event->request, $event->product, $event->quantity));   
        dispatch(new SendMailToAdmin($event->request, $event->product));     
    }
}
