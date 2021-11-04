<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\LeaveBalance;

/**
 * @method LeaveBalance[] get(int $employee_id)
 */
class LeaveBalances extends BaseEndpoint
{
    protected $get = '/employees/{id}/leave_balances';

    protected function transform(array $rawData)
    {
        return \array_map(function ($item) {
            return new LeaveBalance($item);
        }, $rawData);
    }
}
