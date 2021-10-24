<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Entities\Team;

/**
 * @method Team[] getAll()
 */
class Teams extends BaseEndpoint
{
    protected $getAll = '/teams';

    protected function transform(array $rawData)
    {
        return new Team($rawData);
    }
}
