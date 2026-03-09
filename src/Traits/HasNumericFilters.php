<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasNumericFilters
{
    /**
     * Generic numeric filter helper.
     */
    protected function applyNumericFilter(
        string $field,
        ?float $value,
        string $operator = '='
    ): static {
        if ($value === null) {
            return $this;
        }

        $this->search(field: $field, operator: $operator, value: $value);

        return $this;
    }

    /**
     * Generic between filter helper.
     */
    protected function applyBetween(
        string $field,
        ?float $from,
        ?float $to,
        bool $not = false
    ): static {
        if ($from === null || $to === null) {
            return $this;
        }

        $method = $not ? 'whereNotBetween' : 'whereBetween';
        $this->builder->{$method}($field, [$from, $to]);

        return $this;
    }
}
