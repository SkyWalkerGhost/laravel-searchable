<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use InvalidArgumentException;

trait HasPolymorphicFilters
{
    /**
     * @description Filter by modelable type.
     * @description $filed name is required.
     *
     * @return $this
     */
    public function modelable(string $field, ?string $value = null, string $operator = '='): static
    {
        if ($value === null) {
            return $this;
        }

        if (! class_exists($value)) {
            throw new InvalidArgumentException(
                sprintf('Invalid class name [%s].', $value)
            );
        }

        return $this->text(field: $field, value: $value, operator: $operator);
    }

    /**
     * @description $filed name is required.
     * @description Filter by model types.
     *
     * @param  class-string[]|null  $values
     */
    public function modelTypes(
        string $field,
        Collection|array|null $values = null,
        bool $not = false
    ): static {
        $values = Arr::wrap($values);

        if ($values === []) {
            return $this;
        }

        foreach ($values as $class) {
            if (is_array($class)) {
                throw new InvalidArgumentException(
                    'Nested arrays are not allowed. Expected class-string[].'
                );
            }

            if (! is_string($class) || ! class_exists($class)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Each value must be a valid class-string. [%s] given.',
                        is_scalar($class) ? $class : gettype($class)
                    )
                );
            }
        }

        return $this->whereInFilter(
            field: $field,
            values: $values,
            not: $not
        );
    }
}
