<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasPriceFilters
{
    use HasNumericFilters;

    public function price(
        string $field = 'price',
        ?float $value = null,
        string $operator = '=',
    ): static {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: $operator);
    }

    public function priceGreaterThan(
        string $field = 'price',
        ?float $value = null,
    ): static {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '>');
    }

    public function priceLessThan(string $field = 'price', ?float $value = null): static
    {
        $value = $this->parseFloat(field: $field, value: $value);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '<');
    }

    public function priceBetween(
        string $field = 'price',
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: $field, from: $from, to: $to);
    }

    public function priceNotBetween(
        string $field = 'price',
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: $field, from: $from, to: $to, not: true);
    }

    public function priceNull(string|array $field = 'price', string $boolean = 'and', bool $not = false): static
    {
        $this->builder->whereNull($field, $boolean, $not);

        return $this;
    }

    public function priceNotNull(string|array $field = 'price', string $boolean = 'and'): static
    {
        $this->builder->whereNotNull($field, $boolean);

        return $this;
    }

    public function highestPrice(string $field = 'price'): static
    {
        $this->builder->orderBy($field, 'DESC');

        return $this;
    }

    public function lowestPrice(string $field = 'price'): static
    {
        $this->builder->orderBy($field, 'ASC');

        return $this;
    }
}
