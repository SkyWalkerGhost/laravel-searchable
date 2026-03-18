<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasPriceFilters
{
    use HasNumericFilters;

    public function price(?float $value = null, string $operator = '='): static
    {
        $value = $this->parseFloat(field: 'price', value: $value);

        return $this->applyNumericFilter(field: 'price', value: $value, operator: $operator);
    }

    public function priceGreaterThan(?float $value = null): static
    {
        $value = $this->parseFloat(field: 'price', value: $value);

        return $this->applyNumericFilter(field: 'price', value: $value, operator: '>');
    }

    public function priceLessThan(?float $value = null): static
    {
        $value = $this->parseFloat(field: 'price', value: $value);

        return $this->applyNumericFilter(field: 'price', value: $value, operator: '<');
    }

    public function priceBetween(
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: 'price', from: $from, to: $to);
    }

    public function priceNotBetween(
        ?float $from = null,
        ?float $to = null,
        string $fromInput = 'from',
        string $toInput = 'to',
    ): static {
        $from = $this->parseFloat(field: $fromInput, value: $from);
        $to = $this->parseFloat(field: $toInput, value: $to);

        return $this->applyBetween(field: 'price', from: $from, to: $to, not: true);
    }

    public function priceNull(string $boolean = 'and', bool $not = false): static
    {
        $this->builder->whereNull('price', $boolean, $not);

        return $this;
    }

    public function priceNotNull(string $boolean = 'and'): static
    {
        $this->builder->whereNotNull('price', $boolean);

        return $this;
    }

    public function highestPrice(): static
    {
        $this->builder->orderBy('price', 'DESC');

        return $this;
    }

    public function lowestPrice(): static
    {
        $this->builder->orderBy('price', 'ASC');

        return $this;
    }
}
