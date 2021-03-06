<?php

namespace Ettore\Ticketlog\Handlers;

use Log;

class DefaultLaravelHandler implements TicketlogHandlerInterface
{
    /**
     * Log activity in Laravels log handler.
     *
     * @param string $text
     * @param $userId
     * @param array  $attributes
     *
     * @return bool
     */
    public function log($text, $ticketid, $type, $userId = '', $attributes = [])
    {
        $logText = $text;
        $logText .= $ticketid;
        $logText .= $type;
        $logText .= ($userId != '' ? ' (by user_id '.$userId.')' : '');
        $logText .= (count($attributes)) ? PHP_EOL.print_r($attributes, true) : '';

        Log::info($logText);

        return true;
    }

    /**
     * Clean old log records.
     *
     * @param int $maxAgeInMonths
     *
     * @return bool
     */
    public function cleanLog($maxAgeInMonths)
    {
        //this handler can't clean it's records

        return true;
    }
}
