<?php

namespace Kasper334\PeopleforceSdk\Entities;

/**
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property CalendarDataLeaveType|null $leave_type
 */
class CalendarData extends BaseEntity {
    protected static $castEntities = [
        'leave_type' => CalendarDataLeaveType::class,
    ];
}
