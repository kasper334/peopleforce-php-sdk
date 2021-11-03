<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\Employee;

/**
 * @method Employee[] getAll(array $params = [])
 * @method Employee get(int $id)
 */
class Employees extends BaseEndpoint
{
    protected $getAll = '/employees';
    protected $get = '/employees/{id}';
    protected $post = '/employees';
    protected $put = '/employees/{id}';

    protected function transform(array $rawData)
    {
        return new Employee($rawData);
    }
}
