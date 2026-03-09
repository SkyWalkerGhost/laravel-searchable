<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use BackedEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait HasTextFilters
{
    public function text(
        string $field,
        ?string $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {

        $value = $this->parseString(field: $field, value: $value, request: $request);

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, operator: $operator, value: $value);
    }

    public function name(
        string $field = 'name',
        ?string $value = null,
        string $operator = 'ilike',
        ?Request $request = null
    ): static {
        return $this->text(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function firstName(
        string $field = 'first_name',
        ?string $value = null,
        string $operator = 'ilike',
        ?Request $request = null
    ): static {
        return $this->name(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function lastName(
        string $field = 'last_name',
        ?string $value = null,
        string $operator = 'ilike',
        ?Request $request = null
    ): static {
        return $this->name(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function nickname(
        string $field = 'nickname',
        ?string $value = null,
        string $operator = 'ilike',
        ?Request $request = null
    ): static {
        return $this->name(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function email(
        string $field = 'email',
        ?string $value = null,
        string $operator = 'ilike',
        ?Request $request = null
    ): static {
        return $this->name(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function phone(
        string $field = 'phone',
        ?string $value = null,
        string $operator = 'ilike',
        ?Request $request = null
    ): static {
        return $this->name(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function country(
        string $field = 'country',
        ?string $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->text(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function city(
        string $field = 'city',
        ?string $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->text(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function type(
        string $field = 'type',
        ?string $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->text(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function status(
        string $field = 'status',
        ?string $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        return $this->text(field: $field, value: $value, operator: $operator, request: $request);
    }

    public function role(
        string $field = 'role',
        BackedEnum|string|null $value = null,
        string $operator = '=',
        ?Request $request = null
    ): static {
        if ($request !== null) {
            $value = $this->validateInputs(field: $field, request: $request);
        }

        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        if ($value === null) {
            return $this;
        }

        return $this->search(field: $field, operator: $operator, value: $value);
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
