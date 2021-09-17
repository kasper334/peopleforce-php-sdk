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

    /**
     * Cast selected properties to Carbon date objects
     * @return array
     */
    public function castDates(): array
    {
        return [
            'starts_on' => 'Y-m-d',
            'ends_on' => 'Y-m-d',
        ];
    }

    /**
     * Cast selected properties to entities
     * @return array
     */
    public function castEntities(): array
    {
        return [
            'data' => CalendarData::class,
        ];
    }
}
