<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\LeaveRequest;

/**
 * @method LeaveRequest[] getAll(array $params = [])
 */
class LeaveRequests extends BaseEndpoint
{
    protected $getAll = '/leave_requests';

    protected function transform(array $rawData)
    {
        return new LeaveRequest($rawData);
    }
}
