<?php

declare(strict_types=1);

namespace Shergela\Searchable\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Support\Stringable;

class RequestInput
{
    public static function intOrNull(int $id): ?int
    {
        return $id === 0 ? null : $id;
    }

    public static function floatOrNull(int|float|string $value): int|float|null
    {
        if (is_string($value)) {
            $value = trim($value);
            if ($value === '') {
                return null;
            }
        }

        if (is_numeric($value)) {
            $floatValue = (float) $value;

            if ($floatValue === 0.0) {
                return null;
            }

            return $floatValue;
        }

        return null;
    }

    public static function stringOrNull(Stringable|string|null $value): ?string
    {
        if ($value instanceof Stringable) {
            return self::stringOrNull(value: $value->value());
        }

        if ($value === null || $value === '' || is_numeric($value) && (float) $value === 0.0) {
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
}
