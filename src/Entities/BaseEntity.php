<?php

namespace Kasper334\PeopleforceSdk\Entities;

use Carbon\Carbon;

abstract class BaseEntity
{
    /**
     * Cast selected properties to Carbon date objects
     * @var string[]
     */
    protected static $castDates = [];

    /**
     * Cast selected properties to entities
     * @var array
     */
    protected static $castEntities = [];

    /**
     * @param array $initialValues
     */
    public function __construct(array $initialValues = [])
    {
        // map all data
        foreach ($initialValues as $property => $value) {
            $this->$property = $value;
        }

        // cast dates
        foreach (static::$castDates as $property => $format) {
            if ($initialValues[$property] ?? null) {
                $this->$property = Carbon::createFromFormat($format, $initialValues[$property], 'UTC');
            }
        }

        // cast entities
        foreach (static::$castEntities as $property => $entityType) {
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
