<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use BackedEnum;
use Illuminate\Support\Collection;

trait HasTextFilters
{
    public function text(
        string $field,
        ?string $value = null,
        string $operator = '=',
    ): static {
        $value = $this->parseString(field: $field, value: $value);

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, operator: $operator, value: $value);
    }

    public function name(
        string $field = 'name',
        ?string $value = null,
        string $operator = 'ilike',
    ): static {
        return $this->text(field: $field, value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function username(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'username', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function description(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'description', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function slug(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'slug', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function content(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'content', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function meta(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'meta', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function notes(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'notes', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function tags(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'tags', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function bio(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'bio', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function title(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'title', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function firstName(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'first_name', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function lastName(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'last_name', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function fullName(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'full_name', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function gender(?string $value = null, string $operator = '='): static
    {
        return $this->text(field: 'gender', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function nickname(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'nickname', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function email(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'email', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function phone(?string $value = null, string $operator = 'ilike'): static
    {
        return $this->text(field: 'phone', value: $value, operator: $this->getLikeOperator(operator: $operator));
    }

    public function type(
        BackedEnum|string|null $value = null,
        string $operator = '=',
    ): static {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return $this->text(field: 'type', value: $value, operator: $operator);
    }

    public function status(
        BackedEnum|string|null $value = null,
        string $operator = '=',
    ): static {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return $this->text(field: 'status', value: $value, operator: $operator);
    }

    public function role(
        string $field = 'role',
        BackedEnum|string|null $value = null,
        string $operator = '=',
    ): static {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return $this->text(field: $field, value: $value, operator: $operator);
    }

    public function whereIn(
        string $field,
        Collection|array|null $values = null
    ): static {
        return $this->whereInFilter(field: $field, values: $values);
    }

    public function whereNotIn(
        string $field,
        Collection|array|null $values = null
    ): static {
        return $this->whereInFilter(field: $field, values: $values, not: true);
    }

    public function statuses(
        Collection|array|null $values = null,
        string $field = 'status'
    ): static {
        return $this->whereIn(field: $field, values: $values);
    }

    public function notInStatuses(
        Collection|array|null $values = null,
        string $field = 'status'
    ): static {
        return $this->whereNotIn(field: $field, values: $values);
    }

    public function roles(
        Collection|array|null $values = null,
        string $field = 'role'
    ): static {
        return $this->whereIn(field: $field, values: $values);
    }

    public function notInRoles(
        Collection|array|null $values = null,
        string $field = 'role'
    ): static {
        return $this->whereNotIn(field: $field, values: $values);
    }

    protected function whereInFilter(
        string $field,
        Collection|array|null $values = null,
        bool $not = false
    ): static {
        if ($values === null) {
            return $this;
        }

        $values = $values instanceof Collection
            ? $values->toArray()
            : $values;

        $not
            ? $this->builder->whereNotIn($field, $values)
            : $this->builder->whereIn($field, $values);

        return $this;
    }
}
