<?php

namespace App\Listeners;

use App\Events\UpdateMatchDataCsgo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PreLoadMatchDataCsgo
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
     * @param \App\Events\UpdateMatchDataCsgo $event
     * @return void
     */
    public function handle(UpdateMatchDataCsgo $event)
    {
        ray($event->message);
    }
}
