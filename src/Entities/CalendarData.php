<?php

namespace Kasper334\PeopleforceSdk\Entities;

/**
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property CalendarDataLeaveType $leave_type
 */
class CalendarData extends BaseEntity {
    /**
     * Cast selected properties to entities
     * @return array
     */
    public function castEntities(): array
    {
        return [
            'leave_type' => CalendarDataLeaveType::class,
        ];
    }
}
