<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property Carbon $date
 * @property string $amount
 */
class LeaveRequestEntry extends BaseEntity
{
    protected static $castDates = [
        'date' => 'Y-m-d',
    ];
}
