<?php

namespace Kasper334\Tests;

use Kasper334\PeopleforceSdk\Endpoints\{Calendars, Employees, LeaveRequests};

class ApiTest extends BaseTestCase
{
    /**
     * @test
     */
    public function hasAllModules(): void
    {
        $this->assertInstanceOf(LeaveRequests::class, $this->api->leaveRequests);
        $this->assertInstanceOf(Calendars::class, $this->api->calendars);
        $this->assertInstanceOf(Employees::class, $this->api->employees);
    }

    /**
     * @test
     */
    public function throwsErrorOnUnknownModule(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Endpoint "someNonExistingModule" not found');

        $this->assertNull($this->api->someNonExistingModule);
    }
}
