## Unofficial PeopleForce PHP library

This is some minimal implementation of SDK for PeopleForce (WIP).

Usage:
```php
use Kasper334\PeopleforceSdk\API;
use Kasper334\PeopleforceSdk\Entities\LeaveRequest;

$api = new API('PEOPLEFORCE_API_KEY');

$pendingLeaveRequests = $api->leaveRequests->getAll([
    'state' => [LeaveRequest::STATE_PENDING]
]);

$employees = $api->employees->getAll();

$someEmployee = $api->employees->get(112233);

$todayCalendarEvents = $api->calendars->getAll([
    'starts_on' => '2021-09-19',
    'ends_on' => '2021-09-19',
]);
```
