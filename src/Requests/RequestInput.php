<?php

declare(strict_types=1);

namespace Shergela\Searchable\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Support\Stringable;

class RequestInput
{
    public static function intOrNull(int $value): int
    {
        return $value;
    }

    public static function floatOrNull(int|float $value): float
    {
        return (float) $value;
    }

    public static function stringOrNull(Stringable|string|null $value): ?string
    {
        if ($value instanceof Stringable) {
            return self::stringOrNull(value: $value->value());
        }

        if ($value === null || $value === '') {
            return null;
        }

        return $value;
    }

    public static function dateOrNull(Stringable|Carbon|string|null $value): Carbon|string|null
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value;
        }

        if ($value instanceof Stringable) {
            $value = $value->value();
        }

        return $value === '' ? null : $value;
    }

    public static function boolOrNull(bool $boolean): ?true
    {
        return $boolean ? true : null;
    }
}