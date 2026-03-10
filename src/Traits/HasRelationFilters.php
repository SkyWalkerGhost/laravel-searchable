<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Closure;

trait HasRelationFilters
{
    /**
     * @param  array<string>  $relations
     * @return $this
     */
    public function with(array $relations, Closure|string|null $callback = null): static
    {
        $this->builder->with($relations, $callback);

        return $this;
    }

    public function whereRelation(
        string $relation,
        string $field,
        int|float|string|bool|null $value = null,
        string $operator = '='
    ): static {
        if ($value === null) {
            return $this;
        }

        in_array($operator, static::LIKE_OPERATORS)
            ? $this->builder->whereRelation($relation, $field, $operator, "%$value%")
            : $this->builder->whereRelation($relation, $field, $operator, $value);

        return $this;
    }

    public function whereHasRelation(
        string $relation,
        callable $callback
    ): static {
        $this->builder->whereHas($relation, $callback);

        return $this;
    }
}
