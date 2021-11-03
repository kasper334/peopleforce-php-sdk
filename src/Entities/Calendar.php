<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property string $type
 * @property string $title
 * @property Carbon $starts_on
 * @property Carbon $ends_on
 * @property CalendarData $data
 */
class Calendar extends BaseEntity
{
    public const TYPE_BIRTHDAY = 'birthday';
    public const TYPE_FIRST_DAY = 'first_day';
    public const TYPE_LEAVE_REQUEST = 'leave_request';

    protected static $castDates = [
        'starts_on' => '!Y-m-d',
        'ends_on' => '!Y-m-d',
    ];

    protected static $castEntities = [
        'data' => CalendarData::class,
    ];
}
