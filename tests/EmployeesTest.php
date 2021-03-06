<?php

namespace Kasper334\Tests;

use Carbon\Carbon;
use Kasper334\PeopleforceSdk\Entities\{
    Department,
    Division,
    EmergencyContact,
    Employee,
    EmployeeCustomField,
    LeaveBalance,
    LeaveBalanceLeaveType,
    LeaveBalanceLeaveTypePolicy,
    Location,
    Position
};

class EmployeesTest extends BaseTestCase
{
    /**
     * @test
     */
    public function getAll(): void
    {
        $employees = $this->api->employees->getAll(['page' => 1]);
        $this->assertGreaterThan(0, count($employees));

        foreach ($employees as $employee) {
            $this->assertIsEmployeeEntity($employee);
        }
    }

    /**
     * @test
     */
    public function get(): void
    {
        $employee = $this->api->employees->get(42);
        $this->assertIsEmployeeEntity($employee);
    }

    /**
     * @test
     */
    public function getLeaveBalances(): void
    {
        $employeeLeaveBalances = $this->api->employees->leaveBalances->get(42);

        $this->assertIsArray($employeeLeaveBalances);

        $this->assertGreaterThan(0, count($employeeLeaveBalances));

        foreach ($employeeLeaveBalances as $leaveBalance) {
            $this->assertInstanceOf(LeaveBalance::class, $leaveBalance);

            $this->assertInstanceOf(Carbon::class, $leaveBalance->effective_on);

            $this->assertInstanceOf(LeaveBalanceLeaveTypePolicy::class, $leaveBalance->leave_type_policy);

            $this->assertInstanceOf(LeaveBalanceLeaveType::class, $leaveBalance->leave_type);

            $this->assertInstanceOf(Carbon::class, $leaveBalance->leave_type->created_at);
        }
    }

    /**
     * @test
     */
    public function getEmergencyContacts(): void
    {
        $employeeEmergencyContacts = $this->api->employees->emergencyContacts->get(42);

        $this->assertIsArray($employeeEmergencyContacts);

        $this->assertGreaterThan(0, count($employeeEmergencyContacts));

        foreach ($employeeEmergencyContacts as $emergencyContact) {
            $this->assertInstanceOf(EmergencyContact::class, $emergencyContact);
        }
    }

    private function assertIsEmployeeEntity($employee): void
    {
        $this->assertInstanceOf(Employee::class, $employee);

        if ($employee->date_of_birth) {
            $this->assertInstanceOf(Carbon::class, $employee->date_of_birth);
        }

        if ($employee->probation_ends_on) {
            $this->assertInstanceOf(Carbon::class, $employee->probation_ends_on);
        }

        if ($employee->hired_on) {
            $this->assertInstanceOf(Carbon::class, $employee->hired_on);
        }

        if ($employee->created_at) {
            $this->assertInstanceOf(Carbon::class, $employee->created_at);
        }

        if ($employee->updated_at) {
            $this->assertInstanceOf(Carbon::class, $employee->updated_at);
        }

        if ($employee->location) {
            $this->assertInstanceOf(Location::class, $employee->location);
        }

        if ($employee->position) {
            $this->assertInstanceOf(Position::class, $employee->position);
        }

        if ($employee->division) {
            $this->assertInstanceOf(Division::class, $employee->division);
        }

        if ($employee->department) {
            $this->assertInstanceOf(Department::class, $employee->department);
        }

        if ($employee->custom_fields) {
            $this->assertIsArray($employee->custom_fields);

            foreach ($employee->custom_fields as $custom_field) {
                $this->assertInstanceOf(EmployeeCustomField::class, $custom_field);
            }
        }
    }
}
