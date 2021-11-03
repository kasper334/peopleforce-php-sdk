<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

/**
 * @property int $id
 * @property bool $active
 * @property string $full_name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $personal_email
 * @property string|null $mobile_number
 * @property Carbon|null $date_of_birth
 * @property string|null $gender enum: Employee::GENDER_*
 * @property string|null $avatar_url
 * @property Carbon|null $probation_ends_on
 * @property Carbon|null $hired_on
 * @property Location|null $location
 * @property Position|null $position
 * @property Division|null $division
 * @property Department|null $department
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property EmployeeCustomField[]|null $custom_fields
 */
class Employee extends BaseEntity
{
    public const GENDER_MALE = 'male';
    public const GENDER_FEMALE = 'female';

    protected static $castDates = [
        'date_of_birth' => '!Y-m-d',
        'probation_ends_on' => '!Y-m-d',
        'hired_on' => '!Y-m-d',
        'created_at' => '!Y-m-d\TH:i:s\.v\Z',
        'updated_at' => '!Y-m-d\TH:i:s\.v\Z',
    ];

    protected static $castEntities = [
        'location' => Location::class,
        'position' => Position::class,
        'division' => Division::class,
        'department' => Department::class,
        'custom_fields' => [EmployeeCustomField::class],
    ];
}
