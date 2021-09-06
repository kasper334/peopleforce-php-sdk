<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property int $id
 * @property bool $active
 * @property string $full_name
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $personal_email
 * @property string $mobile_number
 * @property Carbon $date_of_birth
 * @property string $gender enum: male, female
 * @property string $avatar_url
 * @property Carbon $probation_ends_on
 * @property Carbon $hired_on
 * @property Location $location
 * @property Position $position
 * @property Division $division
 * @property Department $department
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property EmployeeCustomField[] $custom_fields
 */
class Employee extends BaseEntity
{
    /**
     * Cast selected properties to Carbon date objects
     * @return array
     */
    public function castDates(): array
    {
        return [
            'date_of_birth' => 'Y-m-d',
            'probation_ends_on' => 'Y-m-d',
            'hired_on' => 'Y-m-d',
            'created_at' => 'Y-m-d\TH:i:s\.v\Z',
            'updated_at' => 'Y-m-d\TH:i:s\.v\Z',
        ];
    }
}
