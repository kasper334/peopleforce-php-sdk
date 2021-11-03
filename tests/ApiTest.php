<?php

namespace Kasper334\Tests;

use Kasper334\PeopleforceSdk\Endpoints\{Calendars, Employees, LeaveRequests, LeaveTypes, Teams};

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
        $this->assertInstanceOf(Teams::class, $this->api->teams);
        $this->assertInstanceOf(LeaveTypes::class, $this->api->leaveTypes);
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
