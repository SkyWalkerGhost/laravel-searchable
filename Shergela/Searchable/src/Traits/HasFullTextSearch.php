<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Database\Eloquent\Builder;
use InvalidArgumentException;

trait HasFullTextSearch
{
    /**
     * @description Search for a full text match in the given columns.
     * @description 1. If no columns are provided, the default column is 'full_name'.
     * @description 2. If a relation is provided, the search will be performed on the related model.
     * @description 3. If a value is not provided, the query will be returned unmodified.
     * @description 4. If the database driver is PostgresSQL, the search will be performed using the `to_tsvector` fn.
     * @description 5. If the database driver is MySQL, the search will be performed using the `MATCH` function.
     *
     * @return $this
     */
    public function fullTextSearch(
        array $columns = [],
        ?string $relation = null,
        ?string $value = null,
    ): static {
        if ($value === null) {
            return $this;
        }

        $columns = empty($columns) ? ['full_name'] : $columns;

        $this->validateColumns(columns: $columns);
        $driver = $this->getDatabaseDriver();

        $buildQuery = function (Builder $builder) use ($value, $columns, $driver): void {
            $grammar = $builder->getQuery()->getGrammar();

            if ($driver === 'pgsql') {
                $tsVector = collect($columns)
                    ->map(fn ($column) => "to_tsvector('simple', coalesce({$grammar->wrap($column)}, ''))")
                    ->join(' || ');

                $builder->whereRaw(
                    "($tsVector) @@ plainto_tsquery('simple', ?)",
                    [$value]
                );

            } elseif ($driver === 'mysql') {
                $columnList = collect($columns)
                    ->map(fn ($column) => $grammar->wrap($column))
                    ->implode(', ');

                $builder->whereRaw(
                    "MATCH($columnList) AGAINST(? IN NATURAL LANGUAGE MODE)",
                    [$value]
                );

            } else {
                // fallback: grouped LIKE
                $builder->where(function (Builder $query) use ($columns, $value, $grammar) {
                    foreach ($columns as $index => $column) {
                        $method = $index === 0 ? 'whereRaw' : 'orWhereRaw';
                        $query->$method(
                            "LOWER({$grammar->wrap($column)}) LIKE ?",
                            ['%'.mb_strtolower($value).'%']
                        );
                    }
                });
            }
        };

        if ($relation === null) {
            $buildQuery($this->builder);

            return $this;
        }

        $this->builder->whereHas($relation, $buildQuery);

        return $this;
    }

    /**
     * @description Validate column names for SQL safety.
     *
     * @throws InvalidArgumentException
     */
    private function validateColumns(array $columns): void
    {
        if (count($columns) > 5) {
            throw new InvalidArgumentException(
                'fullTextSearch() accepts a maximum of 5 columns.'
            );
        }

        foreach ($columns as $column) {
            if (! preg_match('/^[a-zA-Z_][a-zA-Z0-9_.]*$/', $column)) {
                throw new InvalidArgumentException(
                    "Column \"$column\" is not a valid column name."
                );
            }
        }
    }
}
