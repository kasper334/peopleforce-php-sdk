<?php

namespace Kasper334\PeopleforceSdk\Entities;

/**
 * @property string $state
 * @property LeaveRequestApprovalAssignee|null $assigned_to
 */
class LeaveRequestApproval extends BaseEntity
{
    /**
     * Cast selected properties to entities
     * @return array
     */
    public function castEntities(): array
    {
        return [
            'assigned_to' => LeaveRequestApprovalAssignee::class,
        ];
    }
}
