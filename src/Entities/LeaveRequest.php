<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property int $id
 * @property int $employee_id
 * @property string $leave_type
 * @property string $state enum: LeaveRequest::STATE_*
 * @property string $amount
 * @property Carbon $starts_on
 * @property Carbon $ends_on
 * @property string $comment
 * @property LeaveRequestEntry[] $entries
 * @property LeaveRequestApproval[] $approvals
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class LeaveRequest extends BaseEntity
{
    public const STATE_PENDING = 'pending';
    public const STATE_APPROVED = 'approved';
    public const STATE_REJECTED = 'rejected';
    public const STATE_WITHDRAWN = 'withdrawn';

    protected static $castDates = [
        'starts_on' => '!Y-m-d',
        'ends_on' => '!Y-m-d',
        'created_at' => '!Y-m-d\TH:i:s\.v\Z',
        'updated_at' => '!Y-m-d\TH:i:s\.v\Z',
    ];

    protected static $castEntities = [
        'entries' => [LeaveRequestEntry::class],
        'approvals' => [LeaveRequestApproval::class],
    ];
}
