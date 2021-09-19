<?php

namespace Kasper334\Tests;

use Carbon\Carbon;
use Kasper334\PeopleforceSdk\Entities\{
    LeaveRequest,
    LeaveRequestApproval,
    LeaveRequestApprovalAssignee,
    LeaveRequestEntry
};

class LeaveRequestsTest extends BaseTestCase
{
    /**
     * @test
     */
    public function getAll(): void
    {
        $leaveRequests = $this->api->leaveRequests->getAll(['page' => 1]);
        $this->assertGreaterThan(0, count($leaveRequests));

        foreach ($leaveRequests as $leaveRequest) {
            $this->assertInstanceOf(LeaveRequest::class, $leaveRequest);

            if ($leaveRequest->starts_on) {
                $this->assertInstanceOf(Carbon::class, $leaveRequest->starts_on);
            }

            if ($leaveRequest->ends_on) {
                $this->assertInstanceOf(Carbon::class, $leaveRequest->ends_on);
            }

            if ($leaveRequest->created_at) {
                $this->assertInstanceOf(Carbon::class, $leaveRequest->created_at);
            }

            if ($leaveRequest->updated_at) {
                $this->assertInstanceOf(Carbon::class, $leaveRequest->updated_at);
            }

            if ($leaveRequest->entries) {
                $this->assertIsArray($leaveRequest->entries);

                foreach ($leaveRequest->entries as $entry) {
                    $this->assertInstanceOf(LeaveRequestEntry::class, $entry);
                    $this->assertInstanceOf(Carbon::class, $entry->date);
                }
            }

            if ($leaveRequest->approvals) {
                $this->assertIsArray($leaveRequest->approvals);

                foreach ($leaveRequest->approvals as $approval) {
                    $this->assertInstanceOf(LeaveRequestApproval::class, $approval);

                    if ($approval->assigned_to) {
                        $this->assertInstanceOf(LeaveRequestApprovalAssignee::class, $approval->assigned_to);
                    }
                }
            }
        }
    }
}
