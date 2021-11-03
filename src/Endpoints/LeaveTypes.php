<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\LeaveType;

/**
 * @method LeaveType[] getAll()
 */
class LeaveTypes extends BaseEndpoint
{
    protected $getAll = '/leave_types';

    protected function transform(array $rawData)
    {
        return new LeaveType($rawData);
    }
}
