<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\Employee;

/**
 * @method Employee[] getAll(array $params = [])
 * @method Employee get(int $id)
 * @property LeaveBalances $leaveBalances
 * @property EmergencyContacts $emergencyContacts
 */
class Employees extends BaseEndpoint
{
    protected $getAll = '/employees';
    protected $get = '/employees/{id}';

    protected $subEndpoints = [
        'leaveBalances' => LeaveBalances::class,
        'emergencyContacts' => EmergencyContacts::class,
    ];

    protected function transform(array $rawData)
    {
        return new Employee($rawData);
    }
}
