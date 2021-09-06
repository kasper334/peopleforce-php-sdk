<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

abstract class BaseEntity
{
    public function __construct(array $initialValues = [])
    {
        // map all data
        foreach ($initialValues as $property => $value) {
            $this->$property = $value;
        }

        // cast dates
        if (\method_exists($this, 'castDates')) {
            foreach ($this->castDates() as $property => $format) {
                if ($initialValues[$property] ?? null) {
                    $this->$property = Carbon::createFromFormat($format, $initialValues[$property]);
                }
            }
        }

        // cast entities
        if (\method_exists($this, 'castEntities')) {
            foreach ($this->castEntities() as $property => $entityType) {
                if ($initialValues[$property] ?? null) {
                    $this->$property = \is_array($entityType)
                        ? \array_map(static function ($initialValuesItem) use ($entityType) {
                            return new $entityType[0]($initialValuesItem);
                        }, $initialValues[$property])
                        : new $entityType($initialValues[$property]);
                }
            }
        }
    }
}
