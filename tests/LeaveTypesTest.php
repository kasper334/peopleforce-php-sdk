<?php

namespace Kasper334\Tests;

use Carbon\Carbon;
use Kasper334\PeopleforceSdk\Entities\LeaveType;

class LeaveTypesTest extends BaseTestCase
{
    /**
     * @test
     */
    public function getAll(): void
    {
        $leaveTypes = $this->api->leaveTypes->getAll();
        $this->assertGreaterThan(0, count($leaveTypes));

        foreach ($leaveTypes as $leaveType) {
            $this->assertIsLeaveTypeEntity($leaveType);
        }
    }

    private function assertIsLeaveTypeEntity($leaveType)
    {
        $this->assertInstanceOf(LeaveType::class, $leaveType);

        $this->assertInstanceOf(Carbon::class, $leaveType->created_at);
    }
}
