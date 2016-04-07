<?php

namespace Ettore\Ticketlog\Handlers;

interface TicketlogHandlerInterface
{
    /**
     * Log some activity.
     *
     * @param string $text
     * @param string $user
     * @param array  $attributes
     *
     * @return bool
     */
    public function log($text, $ticketid, $type, $user = '', $attributes = []);

    /**
     * Clean old log records.
     *
     * @param int $maxAgeInMonths
     *
     * @return bool
     */
    public function cleanLog($maxAgeInMonths);
}
