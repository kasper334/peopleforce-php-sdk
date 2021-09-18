<?php

namespace Kasper334\PeopleforceSdk\Entities;

/**
 * @property string $state
 * @property LeaveRequestApprovalAssignee|null $assigned_to
 */
class LeaveRequestApproval extends BaseEntity
{
    protected static $castEntities = [
        'assigned_to' => LeaveRequestApprovalAssignee::class,
    ];
}
