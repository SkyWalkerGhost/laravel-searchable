<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasZeroFilters
{
    public function zero(string $field = 'amount', ?float $value = 0): static
    {
        return $this->amount(field: $field, value: $value);
    }

    public function notZero(string $field = 'amount', ?float $value = 0): static
    {
        return $this->amount(field: $field, value: $value, operator: '<>');
    }

    public function zeroOrGreater(string $field = 'amount', ?float $value = 0): static
    {
        return $this->amount(field: $field, value: $value, operator: '>=');
    }

    public function zeroOrLess(string $field = 'amount', ?float $value = 0): static
    {
        return $this->amount(field: $field, value: $value, operator: '<=');
    }

    public function positiveAmount(string $field = 'amount'): static
    {
        return $this->amount(field: $field, value: 0, operator: '>');
    }

    public function negativeAmount(string $field = 'amount'): static
    {
        return $this->amount(field: $field, value: 0, operator: '<');
    }
}
