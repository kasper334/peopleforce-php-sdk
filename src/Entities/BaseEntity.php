<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

abstract class BaseEntity
{
    public function __construct(array $initialValues = [])
    {
        foreach ($initialValues as $key => $value) {
            $this->$key = $value;
        }

        if (\method_exists($this, 'castDates')) {
            foreach ($this->castDates() as $dateField => $format) {
                $this->$dateField = $initialValues[$dateField] ?? null
                    ? Carbon::createFromFormat($format, $initialValues[$dateField])
                    : null;
            }
        }
    }
}
