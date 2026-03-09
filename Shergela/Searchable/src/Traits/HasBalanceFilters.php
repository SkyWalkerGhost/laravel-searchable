<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Http\Request;

trait HasBalanceFilters
{
    use HasNumericFilters;

    public function balance(
        string $field = 'balance',
        ?float $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        if ($request !== null) {
            $value = $this->parseFloat(field: $field, value: $value, request: $request);
        }

        return $this->applyNumericFilter(field: $field, value: $value, operator: $operator);
    }

    public function balanceGreaterThan(
        string $field = 'balance',
        ?float $value = null,
        ?Request $request = null
    ): static {
        if ($request !== null) {
            $value = $this->parseFloat(field: $field, value: $value, request: $request);
        }

        return $this->applyNumericFilter(field: $field, value: $value, operator: '>');
    }

    public function balanceLessThan(string $field = 'balance', ?float $value = null, ?Request $request = null): static
    {
        if ($request !== null) {
            $value = $this->parseFloat(field: $field, value: $value, request: $request);
        }

        return $this->applyNumericFilter(field: $field, value: $value, operator: '<');
    }

    public function balanceBetween(
        string $field = 'balance',
        ?float $from = null,
        ?float $to = null,
        ?Request $request = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        if ($request !== null) {
            $from = $this->parseFloat(field: $fromInput, value: $from, request: $request);
            $to = $this->parseFloat(field: $toInput, value: $to, request: $request);
        }

        return $this->applyBetween(field: $field, from: $from, to: $to);
    }

    public function balanceNotBetween(
        string $field = 'balance',
        ?float $from = null,
        ?float $to = null,
        ?Request $request = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        if ($request !== null) {
            $from = $this->parseFloat(field: $fromInput, value: $from, request: $request);
            $to = $this->parseFloat(field: $toInput, value: $to, request: $request);
        }

        return $this->applyBetween(field: $field, from: $from, to: $to, not: true);
    }

    public function balanceNull(string|array $field = 'balance', string $boolean = 'and', bool $not = false): static
    {
        $this->builder->whereNull($field, $boolean, $not);

        return $this;
    }

    public function balanceNotNull(string|array $field = 'balance', string $boolean = 'and'): static
    {
        $this->builder->whereNotNull($field, $boolean);

        return $this;
    }

    public function highestBalance(string $field = 'balance'): static
    {
        $this->builder->orderBy($field, 'DESC');

        return $this;
    }

    public function lowestBalance(string $field = 'balance'): static
    {
        $this->builder->orderBy($field, 'ASC');

        return $this;
    }
}
