<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Shergela\Searchable\Enums\ScalarType;

trait HasParseValue
{
    protected function parseValue(
        string $field,
        int|float|string|bool|null $value = null,
        ScalarType $type = ScalarType::String,
        ?Request $request = null,
    ): int|float|string|bool|null {
        if ($request === null) {
            return $value;
        }

        return $this->validateInputs(
            field: $field,
            request: $request,
            scalarType: $type
        );
    }

    protected function parseInt(
        string $field,
        int|float|string|bool|null $value = null,
        ?Request $request = null,
    ): ?int {
        return $this->parseValue(field: $field, value: $value, type: ScalarType::Int, request: $request);
    }

    protected function parseString(
        string $field,
        int|float|string|bool|null $value = null,
        ?Request $request = null,
    ): ?string {
        return $this->parseValue(field: $field, value: $value, request: $request);
    }

    protected function parseFloat(
        string $field,
        int|float|string|bool|null $value = null,
        ?Request $request = null,
    ): ?float {
        return $this->parseValue(field: $field, value: $value, type: ScalarType::Float, request: $request);
    }

    protected function parseBool(
        string $field,
        int|float|string|bool|null $value = null,
        ?Request $request = null,
    ): ?bool {
        return $this->parseValue(field: $field, value: $value, type: ScalarType::Bool, request: $request);
    }

    protected function parseDate(
        string $field,
        Carbon|string|null $date = null,
        ?Request $request = null,
    ): ?string {
        if ($date instanceof Carbon) {
            $date = $date->toDateString();
        }

        $value = $this->parseValue(field: $field, value: $date, request: $request);

        if ($value === null) {
            return null;
        }

        return Carbon::parse($value)->toDateString();
    }

    protected function parseTime(
        string $field,
        Carbon|string|null $time = null,
        ?Request $request = null,
        string $format = 'H:i:s',
    ): ?string {
        if ($time instanceof Carbon) {
            $time = $time->toTimeString();
        }

        $value = $this->parseValue(field: $field, value: $time, request: $request);

        if ($value === null) {
            return null;
        }

        return Carbon::parse($value)->format($format);
    }
}
