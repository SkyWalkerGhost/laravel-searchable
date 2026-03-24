<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasBalanceFilters
{
    use HasNumericFilters;

    public function balance(?float $value = null, string $operator = '='): static
    {
        $value = $this->parseFloat(field: 'balance', value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->applyNumericFilter(field: 'balance', value: $value, operator: $operator);
    }

    public function balanceGreaterThan(?float $value = null): static
    {
        $value = $this->parseFloat(field: 'balance', value: $value);

        return $this->applyNumericFilter(field: 'balance', value: $value, operator: '>');
    }

    public function balanceLessThan(?float $value = null): static
    {
        $value = $this->parseFloat(field: 'balance', value: $value);

        return $this->applyNumericFilter(field: 'balance', value: $value, operator: '<');
    }

    public function balanceBetween(
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: 'balance', from: $from, to: $to);
    }

    public function balanceNotBetween(
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: 'balance', from: $from, to: $to, not: true);
    }

    public function balanceNull(string $boolean = 'and', bool $not = false): static
    {
        $this->builder->whereNull('balance', $boolean, $not);

        return $this;
    }

    public function balanceNotNull(string $boolean = 'and'): static
    {
        $this->builder->whereNotNull('balance', $boolean);

        return $this;
    }

    public function highestBalance(): static
    {
        $this->builder->orderBy('balance', 'DESC');

        return $this;
    }

    public function lowestBalance(): static
    {
        $this->builder->orderBy('balance', 'ASC');

        return $this;
    }

    public function balanceFrom(?float $value = null): static
    {
        return $this->balanceGreaterThan(value: $value);
    }

    public function balanceTo(?float $value = null): static
    {
        return $this->balanceLessThan(value: $value);
    }
}
