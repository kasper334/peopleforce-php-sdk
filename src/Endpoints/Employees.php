<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\Employee;

/**
 * @method Employee[] getAll()
 * @method Employee get(int $id)
 */
class Employees extends BaseEndpoint
{
    protected $getAll = '/employees';
    protected $get = '/employees/{id}';
}
