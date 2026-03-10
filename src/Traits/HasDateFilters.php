<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Exception;
use Illuminate\Support\Carbon;

trait HasDateFilters
{
    /**
     * Apply a single date filter.
     *
     * @throws Exception
     */
    protected function applyDateFilter(
        string $field,
        Carbon|string|null $date,
        string $operator = '='
    ): static {
        $date = $this->parseDate(field: $field, date: $date);

        if ($date === null) {
            return $this;
        }

        $this->builder->whereDate($field, $operator, $date);

        return $this;
    }

    /**
     * Apply a date range filter (from/to). Nullable boundaries are allowed.
     *
     * @throws Exception
     */
    protected function applyDateRange(
        string $field,
        Carbon|string|null $from = null,
        Carbon|string|null $to = null
    ): static {
        if ($from !== null) {
            $this->applyDateFilter(field: $field, date: $from, operator: '>=');
        }

        if ($to !== null) {
            $this->applyDateFilter(field: $field, date: $to, operator: '<=');
        }

        return $this;
    }

    // Single date shortcuts

    /**
     * @throws Exception
     */
    public function date(string $field = 'created_at', Carbon|string|null $date = null): static
    {
        return $this->applyDateFilter(field: $field, date: $date);
    }

    /**
     * @throws Exception
     */
    public function fromDate(string $field = 'created_at', Carbon|string|null $date = null): static
    {
        return $this->applyDateFilter(field: $field, date: $date, operator: '>=');
    }

    /**
     * @throws Exception
     */
    public function toDate(string $field = 'created_at', Carbon|string|null $date = null): static
    {
        return $this->applyDateFilter(field: $field, date: $date, operator: '<=');
    }

    /**
     * @throws Exception
     */
    public function dateRange(
        string $field = 'created_at',
        Carbon|string|null $from = null,
        Carbon|string|null $to = null
    ): static {
        return $this->applyDateRange(field: $field, from: $from, to: $to);
    }

    // Common shortcuts

    /**
     * @throws Exception
     */
    public function today(string $field = 'created_at'): static
    {
        return $this->applyDateFilter(field: $field, date: Carbon::today());
    }

    /**
     * @throws Exception
     */
    public function yesterday(string $field = 'created_at'): static
    {
        return $this->applyDateFilter(field: $field, date: Carbon::yesterday());
    }

    /**
     * @throws Exception
     */
    public function thisWeek(string $field = 'created_at'): static
    {
        return $this->applyDateRange(
            field: $field,
            from: Carbon::now()->startOfWeek(),
            to: Carbon::now()->endOfWeek()
        );
    }

    /**
     * @throws Exception
     */
    public function lastWeek(string $field = 'created_at'): static
    {
        return $this->applyDateRange(
            field: $field,
            from: Carbon::now()->subWeek()->startOfWeek(),
            to: Carbon::now()->subWeek()->endOfWeek()
        );
    }

    /**
     * @throws Exception
     */
    public function thisMonth(string $field = 'created_at'): static
    {
        return $this->applyDateRange(
            field: $field,
            from: Carbon::now()->startOfMonth(),
            to: Carbon::now()->endOfMonth()
        );
    }

    /**
     * @throws Exception
     */
    public function lastMonth(string $field = 'created_at'): static
    {
        return $this->applyDateRange(
            field: $field,
            from: Carbon::now()->subMonth()->startOfMonth(),
            to: Carbon::now()->subMonth()->endOfMonth()
        );
    }

    /**
     * @throws Exception
     */
    public function thisYear(string $field = 'created_at'): static
    {
        return $this->applyDateRange(
            field: $field,
            from: Carbon::now()->startOfYear(),
            to: Carbon::now()->endOfYear()
        );
    }

    /**
     * @throws Exception
     */
    public function lastYear(string $field = 'created_at'): static
    {
        return $this->applyDateRange(
            field: $field,
            from: Carbon::now()->subYear()->startOfYear(),
            to: Carbon::now()->subYear()->endOfYear()
        );
    }

    // Year / Month filters

    /**
     * @throws Exception
     */
    public function year(string $field = 'created_at', ?int $year = null): static
    {
        $year ??= Carbon::now()->year;

        return $this->applyDateRange(
            field: $field,
            from: Carbon::create($year)->startOfYear(),
            to: Carbon::create($year)->endOfYear()
        );
    }

    /**
     * @throws Exception
     */
    public function month(string $field = 'created_at', ?int $month = null, ?int $year = null): static
    {
        if ($month === null) {
            return $this;
        }

        $year ??= Carbon::now()->year;

        return $this->applyDateRange(
            field: $field,
            from: Carbon::create($year, $month)->startOfMonth(),
            to: Carbon::create($year, $month)->endOfMonth()
        );
    }
}
