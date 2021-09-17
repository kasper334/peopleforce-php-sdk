<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\Calendar;

/**
 * @method Calendar[] getAll(array $params = [])
 */
class Calendars extends BaseEndpoint
{
    protected $getAll = '/calendars';

    protected function transform(array $rawData)
    {
        return new Calendar($rawData);
    }
}
