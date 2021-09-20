<?php

namespace Kasper334\Tests;

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
        $this->api = new API('');
    }
}
