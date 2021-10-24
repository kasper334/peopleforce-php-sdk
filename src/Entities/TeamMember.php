<?php

namespace Kasper334\PeopleforceSdk\Entities;

/**
 * @property int $id
 * @property TeamMemberUser $user
 */
class TeamMember extends BaseEntity
{
    protected static $castEntities = [
        'user' => TeamMemberUser::class,
    ];
}
