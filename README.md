## Unofficial PeopleForce PHP library

This is some minimal implementation of SDK for PeopleForce (WIP).

### Installation
```bash
composer require kasper334/peopleforce-sdk
```

### Usage:
```php
use Kasper334\PeopleforceSdk\API;
use Kasper334\PeopleforceSdk\Entities\LeaveRequest;

$api = new API('PEOPLEFORCE_API_KEY');

$pendingLeaveRequests = $api->leaveRequests->getAll([
    'states' => [LeaveRequest::STATE_PENDING],
    'employee_ids' => [12345],
    'starts_on' => '2021-01-01',
    'ends_on' => '2021-01-31',
]);

$employees = $api->employees->getAll();

$someEmployee = $api->employees->get(112233);

$someEmployeeLeaveBalances = $api->employees->leaveBalances->get(112233);

$todayCalendarEvents = $api->calendars->getAll([
    'starts_on' => '2021-09-19',
    'ends_on' => '2021-09-19',
]);

$teams = $api->teams->getAll();

$leaveTypes = $api->leaveTypes->getAll();
```
