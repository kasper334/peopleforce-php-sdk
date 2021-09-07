<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property Carbon $date
 * @property string $amount
 */
class LeaveRequestEntry extends BaseEntity
{
    /**
     * Cast selected properties to Carbon date objects
     * @return array
     */
    public function castDates(): array
    {
        return [
            'date' => 'Y-m-d',
        ];
    }
}
