<?php

namespace Kasper334\PeopleforceSdk;

use Kasper334\PeopleforceSdk\Endpoints\BaseEndpoint;
use Kasper334\PeopleforceSdk\Endpoints\Calendars;
use Kasper334\PeopleforceSdk\Endpoints\Employees;
use Kasper334\PeopleforceSdk\Endpoints\LeaveRequests;

/**
 * Client used to send requests to PeopleForce's API.
 *
 * @property Employees $employees
 * @property LeaveRequests $leaveRequests
 * @property Calendars $calendars
 */
class API
{
    private static $endpoints = [
        'employees' => Employees::class,
        'leaveRequests' => LeaveRequests::class,
        'calendars' => Calendars::class,
    ];

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param string $apiKey PeopleForce API key, can be obtained at https://{subdomain}.peopleforce.io/settings/api_keys
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return BaseEndpoint
     * @throws \Exception
     */
    public function __get($name)
    {
        if (!\array_key_exists($name, self::$endpoints)) {
            throw new \Exception("Endpoint \"{$name}\" not found");
        }

        if (!\is_subclass_of(self::$endpoints[$name], BaseEndpoint::class)) {
            throw new \Exception("Entity for endpoint \"{$name}\" must extend BaseEndpoint");
        }

        return new self::$endpoints[$name]($this->apiKey);
    }
}
