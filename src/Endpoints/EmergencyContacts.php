<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\EmergencyContact;

/**
 * @method EmergencyContact[] get(int $employee_id)
 */
class EmergencyContacts extends BaseEndpoint
{
    protected $get = '/employees/{id}/emergency_contacts';

    protected function transform(array $rawData)
    {
        return \array_map(function ($item) {
            return new EmergencyContact($item);
        }, $rawData);
    }
}
