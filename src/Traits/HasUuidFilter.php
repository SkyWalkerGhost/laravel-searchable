<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

trait HasUuidFilter
{
    public function uuid(string $field = 'uuid', ?string $value = null, string $operator = '='): static
    {
        $value = $this->parseString(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, operator: $operator, value: $value);
    }

    public function uuidLike(string $field = 'uuid', ?string $value = null): static
    {
        return $this->uuid(field: $field, value: $value, operator: $this->getDatabaseLikeOperator());
    }
}
