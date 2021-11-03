<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $unit
 * @property string $hex_color
 * @property string $fa_class
 * @property Carbon $created_at
 */
class LeaveType extends BaseEntity
{
    protected static $castDates = [
        'created_at' => '!Y-m-d\TH:i:s\.v\Z',
    ];
}
