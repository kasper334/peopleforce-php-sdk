<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property TeamLead $team_lead
 * @property TeamMember[] $team_members
 *
 */
class Team extends BaseEntity
{
    protected static $castDates = [
        'created_at' => 'Y-m-d\TH:i:s\.v\Z',
        'updated_at' => 'Y-m-d\TH:i:s\.v\Z',
    ];

    protected static $castEntities = [
        'team_lead' => TeamLead::class,
        'team_members' => [TeamMember::class],
    ];
}
