<?php

namespace Kasper334\Tests;

use Carbon\Carbon;
use Kasper334\PeopleforceSdk\Entities\CalendarData;

class CalendarsTest extends BaseTestCase
{
    /**
     * @test
     */
    public function getAll(): void
    {
        $calendarEvents = $this->api->calendars->getAll(['page' => 1]);

        $this->assertGreaterThan(0, count($calendarEvents));

        foreach ($calendarEvents as $calendarEvent) {
            if ($calendarEvent->starts_on) {
                $this->assertInstanceOf(Carbon::class, $calendarEvent->starts_on);
            }

            if ($calendarEvent->ends_on) {
                $this->assertInstanceOf(Carbon::class, $calendarEvent->ends_on);
            }

            if ($calendarEvent->data) {
                $this->assertInstanceOf(CalendarData::class, $calendarEvent->data);
            }
        }
    }
}
