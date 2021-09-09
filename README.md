## Unofficial PeopleForce PHP library

This is some minimal implementation of SDK for PeopleForce (WIP).

Usage:
```php
use Kasper334\PeopleforceSdk\API;

$api = new API('PEOPLEFORCE_API_KEY');

$leaveRequests = $api->leaveRequests->getAll();

$employees = $api->employees->getAll();

$someEmployee = $api->employees->get(112233);
```
