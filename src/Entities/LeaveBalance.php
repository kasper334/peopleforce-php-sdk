<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property int $id
 * @property Carbon $effective_on
 * @property string $balance
 * @property LeaveBalanceLeaveTypePolicy $leave_type_policy
 * @property LeaveBalanceLeaveType $leave_type
 */
class LeaveBalance extends BaseEntity
{
    protected static $castDates = [
        'effective_on' => '!Y-m-d',
    ];

    protected static $castEntities = [
        'leave_type_policy' => LeaveBalanceLeaveTypePolicy::class,
        'leave_type' => LeaveBalanceLeaveType::class,
    ];
}
