<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

trait HasTimeFilters
{
    public function time(
        string $field = 'created_at',
        Carbon|string|null $value = null,
        string $operator = '=',
        ?Request $request = null,
        ?string $format = null
    ): static {
        $value = $this->parseTime(field: $field, time: $value, request: $request, format: $format);

        if ($value === null) {
            return $this;
        }

        $this->builder->whereTime($field, $operator, $value);

        return $this;
    }

    public function timeBetween(
        string $field = 'created_at',
        Carbon|string|null $from = null,
        Carbon|string|null $to = null,
        ?Request $request = null,
        ?string $format = null
    ): static {
        $from = $this->parseTime(field: $field, time: $from, request: $request, format: $format);
        $to = $this->parseTime(field: $field, time: $to, request: $request, format: $format);

        if ($from === null || $to === null) {
            return $this;
        }

        $this->builder->whereTime($field, '>=', $from)
            ->whereTime($field, '<=', $to);

        return $this;
    }

    public function timeBefore(
        string $field = 'created_at',
        Carbon|string|null $value = null,
        ?Request $request = null,
        ?string $format = null
    ): static {
        $value = $this->parseTime(field: $field, time: $value, request: $request, format: $format);

        if ($value === null) {
            return $this;
        }

        $this->builder->whereTime($field, '<', $value);

        return $this;
    }

    public function timeAfter(
        string $field = 'created_at',
        Carbon|string|null $value = null,
        ?Request $request = null,
        ?string $format = null
    ): static {
        $value = $this->parseTime(field: $field, time: $value, request: $request, format: $format);

        if ($value === null) {
            return $this;
        }

        $this->builder->whereTime($field, '>', $value);

        return $this;
    }
}
