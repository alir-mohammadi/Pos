<?php

namespace App\Listeners\Store\Sell;

use App\Events\Store\Sell\MakeFactorEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MakeFactorListener
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
     * @param  MakeFactorEvent  $event
     * @return void
     */
    public function handle(MakeFactorEvent $event)
    {

    }
}
