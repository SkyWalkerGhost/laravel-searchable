<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use BackedEnum;
use Illuminate\Support\Collection;

trait HasEnumFilters
{
    /**
     * @return array<string>
     */
    protected function normalizeEnum(Collection|array|string $values): array
    {
        if (is_string($values)) {
            if (class_exists($values)) {
                /** @var BackedEnum $values */
                $values = $values::cases();
            } else {
                $values = [$values];
            }
        }

        /** @var array<string> $values */
        $values = collect($values)->map(function ($enum) {
            return $enum instanceof BackedEnum ? $enum->value : $enum;
        })->toArray();

        return $values;
    }

    public function enum(string $field, ?BackedEnum $value = null, string $operator = '='): static
    {
        if ($value === null) {
            return $this;
        }

        $this->search(field: $field, operator: $operator, value: $value->value);

        return $this;
    }

    public function enums(string $field, Collection|array|string|null $values = null): static
    {
        if ($values === null) {
            return $this;
        }

        $values = $this->normalizeEnum(values: $values);

        $this->whereIn(field: $field, values: $values);

        return $this;
    }

    public function enumNotIn(string $field, Collection|array|string|null $values = null): static
    {
        if ($values === null) {
            return $this;
        }

        $values = $this->normalizeEnum(values: $values);

        $this->builder->whereNotIn($field, $values);

        return $this;
    }
}
