<?php

namespace Ettore\Ticketlog\Handlers;

use Ettore\Ticketlog\Models\Activityticket;
use Carbon\Carbon;

class EloquentHandler implements TicketlogHandlerInterface
{
    /**
     * Log activity in an Eloquent model.
     *
     * @param string $text
     * @param $userId
     * @param array  $attributes
     *
     * @return bool
     */
    public function log($text, $ticketid, $type, $userId = '', $attributes = [])
    {
        Activityticket::create(
            [
                'text' => $text,
                'ticket_id' => $ticketid,
                'type' => $type,
                'user_id' => ($userId == '' ? null : $userId),
                'ip_address' => $attributes['ipAddress'],
            ]
        );

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
        $minimumDate = Carbon::now()->subMonths($maxAgeInMonths);
        Activityticket::where('created_at', '<=', $minimumDate)->delete();

        return true;
    }
}
