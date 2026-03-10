<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasAmountFilters
{
    use HasNumericFilters;

    public function amount(
        string $field = 'amount',
        ?float $value = null,
        string $operator = '=',
    ): static {
        $value = $this->parseFloat(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->applyNumericFilter(field: $field, value: $value, operator: $operator);
    }

    public function amountGreaterThan(string $field = 'amount', ?float $value = null): static
    {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '>');
    }

    public function amountLessThan(string $field = 'amount', ?float $value = null): static
    {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '<');
    }

    public function amountBetween(
        string $field = 'amount',
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: $field, from: $from, to: $to);
    }

    public function amountNotBetween(
        string $field = 'amount',
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: $field, from: $from, to: $to, not: true);
    }

    public function amountNull(string|array $field = 'amount', string $boolean = 'and', bool $not = false): static
    {
        $this->builder->whereNull($field, $boolean, $not);

        return $this;
    }

    public function amountNotNull(string|array $field = 'amount', string $boolean = 'and'): static
    {
        $this->builder->whereNotNull($field, $boolean);

        return $this;
    }

    public function highestAmount(string $field = 'amount'): static
    {
        $this->builder->orderBy($field, 'DESC');

        return $this;
    }

    public function lowestAmount(string $field = 'amount'): static
    {
        $this->builder->orderBy($field, 'ASC');

        return $this;
    }
}
