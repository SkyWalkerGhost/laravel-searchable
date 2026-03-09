<?php

declare(strict_types=1);

namespace Shergela\Searchable;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Cursor;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Shergela\Searchable\Traits\HasAmountFilters;
use Shergela\Searchable\Traits\HasBalanceFilters;
use Shergela\Searchable\Traits\HasBooleanFilters;
use Shergela\Searchable\Traits\HasDateFilters;
use Shergela\Searchable\Traits\HasEnumFilters;
use Shergela\Searchable\Traits\HasFullTextSearch;
use Shergela\Searchable\Traits\HasIdFilters;
use Shergela\Searchable\Traits\HasParseValue;
use Shergela\Searchable\Traits\HasPriceFilters;
use Shergela\Searchable\Traits\HasRelationFilters;
use Shergela\Searchable\Traits\HasTextFilters;
use Shergela\Searchable\Traits\HasTimeFilters;
use Shergela\Searchable\Traits\HasValidateInputs;

abstract class Searchable
{
    use HasAmountFilters;
    use HasBalanceFilters;
    use HasBooleanFilters;
    use HasDateFilters;
    use HasEnumFilters;
    use HasFullTextSearch;
    use HasIdFilters;
    use HasParseValue;
    use HasPriceFilters;
    use HasRelationFilters;
    use HasTextFilters;
    use HasTimeFilters;
    use HasValidateInputs;

    protected const array SEARCH_OPERATORS = ['ilike', 'like'];

    protected Builder $builder;

    protected bool $ignoreMissingFields = false;

    public function __construct(?Builder $builder = null)
    {
        $this->builder = $builder ?? $this->model();
    }

    /**
     * @description  must define model
     */
    abstract protected function model(): Builder;

    protected function getDatabaseDriver(): string
    {
        return DB::getDriverName();
    }

    /**
     * @description Create a new query builder instance for the model.
     */
    public static function query(?Builder $builder = null): static
    {
        return new static($builder);
    }

    /**
     * @description Ignore missing inputs (readonly/disabled inputs)
     */
    public function ignoreMissingFields(): static
    {
        $this->ignoreMissingFields = true;

        return $this;
    }

    /**
     * @description Check if missing inputs should be ignored (readonly/disabled inputs)
     */
    protected function shouldIgnoreMissingFields(): bool
    {
        return $this->ignoreMissingFields;
    }

    protected function search(
        string $field,
        string $operator = '=',
        int|float|string|bool|null $value = null,
    ): static {
        if ($value === null) {
            return $this;
        }

        in_array($operator, static::SEARCH_OPERATORS)
            ? $this->builder->where($field, $operator, "%$value%")
            : $this->builder->where($field, $operator, $value);

        return $this;
    }

    public function builder(): Builder
    {
        return $this->builder;
    }

    public function get(): Collection
    {
        return $this->builder->get();
    }

    public function first(): ?Model
    {
        return $this->builder->first();
    }

    public function pluck(string $column, ?string $key = null): Collection
    {
        return $this->builder->pluck($column, $key);
    }

    public function orderBy(string $field = 'id'): static
    {
        $this->builder->orderBy($field, 'ASC');

        return $this;
    }

    public function orderByDesc(string $field = 'id'): static
    {
        $this->builder->orderBy($field, 'DESC');

        return $this;
    }

    public function latest(?string $column = null): static
    {
        $this->builder->latest($column);

        return $this;
    }

    public function paginate(
        int $perPage = 15,
        array $columns = ['*'],
        string $pageName = 'page',
        ?int $page = null,
        Closure|int|null $total = null
    ): LengthAwarePaginator {
        return $this->builder
            ->paginate(
                perPage: $perPage,
                columns: $columns,
                pageName: $pageName,
                page: $page,
                total: $total
            )
            ->withQueryString();
    }

    public function cursorPaginate(
        int $perPage = 15,
        array $columns = ['*'],
        string $cursorName = 'cursor',
        Cursor|string|null $cursor = null,
    ): CursorPaginator {
        return $this->builder->cursorPaginate(
            perPage: $perPage,
            columns: $columns,
            cursorName: $cursorName,
            cursor: $cursor
        )->withQueryString();
    }
}
