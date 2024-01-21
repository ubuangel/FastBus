<?php

namespace App\Listeners;

use App\Events\SelectviajeChangedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SelectviajeListener
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
    public function handle(SelectviajeChangedEvent $event): void
    {
        //
    }
}
