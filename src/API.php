<?php

namespace Kasper334\PeopleforceSdk;

use Kasper334\PeopleforceSdk\Endpoints\Employees;

/**
 * Client used to send requests to PeopleForce's API.
 *
 * @property Employees $employees
 */
class API
{
    private static $endpoints = [
        'employees' => Employees::class,
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
     * @throws \Exception
     */
    public function __get($name)
    {
        if (!\array_key_exists($name, self::$endpoints)) {
            throw new \Exception("Endpoint \"{$name}\" not found");
        }

        // todo intellisense
        return new self::$endpoints[$name]($this->apiKey);
    }
}
