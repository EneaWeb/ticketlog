<?php

namespace Ettore\Ticketlog;

use Activityticket;

trait LogsActivityticket
{
    protected static function bootLogsActivityticket()
    {
        foreach (static::getRecordActivityticketEvents() as $eventName) {
            static::$eventName(function (LogsActivityticketInterface $model) use ($eventName) {

                $message = $model->getActivityticketDescriptionForEvent($eventName);

                if ($message != '') {
                    Activityticket::log($message);
                }
            });
        }
    }

    /**
     * Set the default events to be recorded if the $recordEvents
     * property does not exist on the model.
     *
     * @return array
     */
    protected static function getRecordActivityticketEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'updated', 'deleting', 'deleted',
        ];
    }
}
