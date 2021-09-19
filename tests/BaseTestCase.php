<?php

namespace Kasper334\Tests;

use Dotenv\Dotenv;
use Kasper334\PeopleforceSdk\API;
use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase
{
    /**
     * @var API
     */
    protected $api;

    public function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->api = new API($_ENV['PEOPLEFORCE_TEST_API_KEY']);
    }
}
