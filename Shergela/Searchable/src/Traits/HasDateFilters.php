<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

trait HasDateFilters
{
    public function date(
        string $field = 'created_at',
        Carbon|string|null $date = null,
        ?Request $request = null
    ): static {
        $date = $this->parseDate(field: $field, date: $date, request: $request);

        if ($date === null) {
            return $this;
        }

        $this->builder->whereDate($field, $date);

        return $this;
    }

    // From date
    public function fromDate(
        string $field = 'created_at',
        Carbon|string|null $date = null,
        ?Request $request = null
    ): static {
        $date = $this->parseDate(field: $field, date: $date, request: $request);

        if ($date === null) {
            return $this;
        }

        $this->builder->whereDate($field, '>=', $date);

        return $this;
    }

    // To date
    public function toDate(
        string $field = 'created_at',
        Carbon|string|null $date = null,
        ?Request $request = null
    ): static {
        $date = $this->parseDate(field: $field, date: $date, request: $request);

        if ($date === null) {
            return $this;
        }

        $this->builder->whereDate($field, '<=', $date);

        return $this;
    }

    // Range
    public function dateRange(
        string $field = 'created_at',
        Carbon|string|null $from = null,
        Carbon|string|null $to = null,
        ?Request $request = null
    ): static {
        $from = $this->parseDate(field: $field, date: $from, request: $request);
        $to = $this->parseDate(field: $field, date: $to, request: $request);

        if ($from === null || $to === null) {
            return $this;
        }

        return $this->fromDate(field: $field, date: $from)
            ->toDate(field: $field, date: $to);
    }

    // Shortcut methods
    public function today(string $field = 'created_at'): static
    {
        return $this->date(field: $field, date: Carbon::today());
    }

    public function yesterday(string $field = 'created_at'): static
    {
        return $this->date(field: $field, date: Carbon::yesterday());
    }

    public function thisWeek(string $field = 'created_at'): static
    {
        return $this->fromDate(field: $field, date: Carbon::now()->startOfWeek())
            ->toDate(field: $field, date: Carbon::now()->endOfWeek());
    }

    public function lastWeek(string $field = 'created_at'): static
    {
        return $this->fromDate(field: $field, date: Carbon::now()->subWeek()->startOfWeek())
            ->toDate(field: $field, date: Carbon::now()->subWeek()->endOfWeek());
    }

    public function thisMonth(string $field = 'created_at'): static
    {
        return $this->fromDate(field: $field, date: Carbon::now()->startOfMonth())
            ->toDate(field: $field, date: Carbon::now()->endOfMonth());
    }

    public function lastMonth(string $field = 'created_at'): static
    {
        return $this->fromDate(field: $field, date: Carbon::now()->subMonth()->startOfMonth())
            ->toDate(field: $field, date: Carbon::now()->subMonth()->endOfMonth());
    }

    public function thisYear(string $field = 'created_at'): static
    {
        return $this->fromDate(field: $field, date: Carbon::now()->startOfYear())
            ->toDate(field: $field, date: Carbon::now()->endOfYear());
    }

    public function lastYear(string $field = 'created_at'): static
    {
        return $this->fromDate(field: $field, date: Carbon::now()->subYear()->startOfYear())
            ->toDate(field: $field, date: Carbon::now()->subYear()->endOfYear());
    }

    // Year / Month filters
    public function year(string $field = 'created_at', ?int $year = null, ?Request $request = null): static
    {
        if ($request !== null) {
            $year = $this->validateInputs(field: $field, request: $request, scalarType: ScalarType::Int);
        }

        if ($year === null) {
            return $this;
        }

        return $this->fromDate(field: $field, date: Carbon::createFromDate($year)->startOfYear())
            ->toDate(field: $field, date: Carbon::createFromDate($year)->endOfYear());
    }

    public function month(string $field = 'created_at', ?int $month = null, ?int $year = null): static
    {
        if ($month === null) {
            return $this;
        }
        $year ??= Carbon::now()->year;

        return $this->fromDate(field: $field, date: Carbon::create($year, $month)->startOfMonth())
            ->toDate(field: $field, date: Carbon::create($year, $month)->endOfMonth());
    }
}
