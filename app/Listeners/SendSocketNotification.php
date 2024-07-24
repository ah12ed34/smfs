<?php

namespace App\Listeners;

use App\Traits\RequestTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NotificationSent;

class SendSocketNotification
{
    use RequestTrait;
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
    public function handle(NotificationSent  $event): void
    {
        //
        $this->sendSocketIONotification($event->channel, $event->message);
    }
}
