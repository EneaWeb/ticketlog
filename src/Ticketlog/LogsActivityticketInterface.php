<?php

namespace Ettore\Ticketlog;

interface LogsActivityticketInterface
{
    /**
     * Get the message that needs to be logged for the given event.
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getActivityticketDescriptionForEvent($eventName);
}
