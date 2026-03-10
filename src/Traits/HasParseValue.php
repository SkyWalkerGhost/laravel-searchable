<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Exception;
use Illuminate\Support\Carbon;
use Shergela\Searchable\Enums\ScalarType;

trait HasParseValue
{
    /**
     * @template T of int|float|string|bool|null
     * @param  T|null  $value
     */
    protected function parseValue(
        string $field,
        int|float|string|bool|null $value = null,
        ScalarType $type = ScalarType::String,
    ): Carbon|int|float|string|bool|null {
        $value = $value ?? $this->validateInputs(field: $field, scalarType: $type);

        if ($value === null) {
            return null;
        }

        return $value;
    }

    protected function parseInt(
        string $field,
        ?int $value = null,
    ): ?int {
        return $this->parseValue(field: $field, value: $value, type: ScalarType::Int);
    }

    protected function parseString(
        string $field,
        ?string $value = null,
    ): ?string {
        return $this->parseValue(field: $field, value: $value);
    }

    protected function parseFloat(
        string $field,
        ?float $value = null,
    ): ?float {
        return $this->parseValue(field: $field, value: $value, type: ScalarType::Float);
    }

    protected function parseBool(
        string $field,
        ?bool $value = null,
    ): ?bool {
        return $this->parseValue(field: $field, value: $value, type: ScalarType::Bool);
    }

    /**
     * @throws Exception
     */
    protected function parseDate(
        string $field,
        Carbon|string|null $date = null,
    ): ?string {
        if ($date instanceof Carbon) {
            return $date->toDateString();
        }

        $value = $this->parseValue(field: $field, value: $date);

        if ($value === null) {
            return null;
        }

        try {
            return Carbon::parse($value)->toDateString();
        } catch (Exception $e) {
            throw new Exception(
                "Invalid date format for field: $field. Carbon error: ".$e->getMessage()
            );
        }
    }

    /**
     * @throws Exception
     */
    protected function parseTime(
        string $field,
        Carbon|string|null $time = null,
        string $format = 'H:i:s',
    ): ?string {
        if ($time instanceof Carbon) {
            return $time->toTimeString();
        }

        $value = $this->parseValue(field: $field, value: $time);

        if ($value === null) {
            return null;
        }

        try {
            return Carbon::parse($value)->format($format);
        } catch (Exception $e) {
            throw new Exception(
                "Invalid time format for field: $field. Carbon error: ".$e->getMessage()
            );
        }
    }
}
