<?php

namespace Kasper334\PeopleforceSdk;

class Helpers
{
    /**
     * Custom-implemented query builder for getting around PeopleForce's inability to parse encoded square brackets
     * @param array $params
     * @return string
     */
    public static function buildQuery(array $params = [])
    {
        return implode('&', \array_map(static function ($value, string $name) {
            return \is_array($value)
                ? implode('&', \array_map(static function ($subvalue) use ($name) {
                    return urlencode($name) . '[]=' . urlencode($subvalue);
                }, $value))
                : urlencode($name) . '=' . urlencode($value);
        }, $params, \array_keys($params)));
    }
}
