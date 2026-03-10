<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Exception;
use Illuminate\Support\Carbon;

trait HasTimeFilters
{
    /**
     * Apply a single time filter.
     * @throws Exception
     */
    protected function applyTimeFilter(
        string $field,
        Carbon|string|null $value,
        string $operator = '=',
        ?string $format = null
    ): static {
        $value = $this->parseTime(field: $field, time: $value, format: $format);

        if ($value === null) {
            return $this;
        }

        $this->builder->whereTime($field, $operator, $value);

        return $this;
    }

    /**
     * Apply a time range filter (from/to). Nullable boundaries allowed.
     * @throws Exception
     */
    protected function applyTimeRange(
        string $field,
        Carbon|string|null $from = null,
        Carbon|string|null $to = null,
        ?string $format = null
    ): static {
        if ($from !== null) {
            $this->applyTimeFilter(field: $field, value: $from, operator: '>=', format: $format);
        }

        if ($to !== null) {
            $this->applyTimeFilter(field: $field, value: $to, operator: '<=', format: $format);
        }

        return $this;
    }

    // Single time shortcuts

    /**
     * @throws Exception
     */
    public function time(
        string $field = 'created_at',
        Carbon|string|null $value = null,
        string $operator = '=',
        ?string $format = null
    ): static {
        return $this->applyTimeFilter(field: $field, value: $value, operator: $operator, format: $format);
    }

    /**
     * @throws Exception
     */
    public function timeBefore(
        string $field = 'created_at',
        Carbon|string|null $value = null,
        ?string $format = null
    ): static {
        return $this->applyTimeFilter(field: $field, value: $value, operator: '<', format: $format);
    }

    /**
     * @throws Exception
     */
    public function timeAfter(
        string $field = 'created_at',
        Carbon|string|null $value = null,
        ?string $format = null
    ): static {
        return $this->applyTimeFilter(field: $field, value: $value, operator: '>', format: $format);
    }

    /**
     * @throws Exception
     */
    public function timeBetween(
        string $field = 'created_at',
        Carbon|string|null $from = null,
        Carbon|string|null $to = null,
        ?string $format = null
    ): static {
        return $this->applyTimeRange(field: $field, from: $from, to: $to, format: $format);
    }
}