<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasBooleanFilters
{
    // Base boolean filter
    public function boolean(
        string $field,
        ?bool $value = null,
        string $operator = 'and'
    ): static {
        if ($value === null) {
            return $this;
        }

        $this->builder->where($field, '=', $value, $operator);

        return $this;
    }

    public function active(
        string $field = 'is_active',
        ?bool $value = true,
        string $operator = 'and'
    ): static {
        return $this->boolean(field: $field, value: $value, operator: $operator);
    }

    public function verified(
        string $field = 'is_verified',
        ?bool $value = true,
        string $operator = 'and'
    ): static {
        return $this->boolean(field: $field, value: $value, operator: $operator);
    }

    public function blocked(
        string $field = 'is_blocked',
        ?bool $value = true,
        string $operator = 'and'
    ): static {
        return $this->boolean(field: $field, value: $value, operator: $operator);
    }

    // Helpers: where true / false
    public function whereTrue(
        string $field,
        string $operator = 'and'
    ): static {
        $this->builder->where($field, true, $operator);

        return $this;
    }

    public function whereFalse(
        string $field,
        string $operator = 'and'
    ): static {
        $this->builder->where($field, false, $operator);

        return $this;
    }

    // Multiple fields at once
    public function booleans(
        array $fields,
        string $operator = 'and'
    ): static {
        foreach ($fields as $field => $value) {
            if ($value === null) {
                continue;
            }

            $this->builder->where($field, '=', (bool) $value, $operator);
        }

        return $this;
    }
}
