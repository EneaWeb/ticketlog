<?php

namespace Ettore\Ticketlog;

use Illuminate\Support\Facades\Facade;

class ActivityticketlogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'activityticket';
    }
}
