<?php

namespace Kasper334\PeopleforceSdk;

use Kasper334\PeopleforceSdk\Endpoints\{BaseEndpoint, Calendars, Employees, LeaveRequests, LeaveTypes, Teams};

/**
 * Client used to send requests to PeopleForce's API.
 *
 * @property Employees $employees
 * @property LeaveRequests $leaveRequests
 * @property Calendars $calendars
 * @property Teams $teams
 * @property LeaveTypes $leaveTypes
 */
class API
{
    private static $endpoints = [
        'employees' => Employees::class,
        'leaveRequests' => LeaveRequests::class,
        'calendars' => Calendars::class,
        'teams' => Teams::class,
        'leaveTypes' => LeaveTypes::class,
    ];

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string|null
     */
    private $apiBase;

    /**
     * @param string $apiKey PeopleForce API key, can be obtained at https://{subdomain}.peopleforce.io/settings/api_keys
     * @param string|null $apiBase Base API origin, defaults to "https://app.peopleforce.io/api/public/v1"
     */
    public function __construct(string $apiKey, ?string $apiBase = null)
    {
        $this->apiKey = $apiKey;
        $this->apiBase = $apiBase;
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

        return new self::$endpoints[$name]($this->apiKey, $this->apiBase);
    }
}
