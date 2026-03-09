<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Http\Request;

trait HasPriceFilters
{
    use HasNumericFilters;

    public function price(
        string $field = 'price',
        ?float $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        $value = $this->parseFloat(field: $field, value: $value, request: $request);

        return $this->applyNumericFilter(field: $field, value: $value, operator: $operator);
    }

    public function priceGreaterThan(
        string $field = 'price',
        ?float $value = null,
        ?Request $request = null
    ): static {
        $value = $this->parseFloat(field: $field, value: $value, request: $request);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '>');
    }

    public function priceLessThan(string $field = 'price', ?float $value = null, ?Request $request = null): static
    {
        $value = $this->parseFloat(field: $field, value: $value, request: $request);

        return $this->applyNumericFilter(field: $field, value: $value, operator: '<');
    }

    public function priceBetween(
        string $field = 'price',
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

    public function priceNotBetween(
        string $field = 'price',
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
