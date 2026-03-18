<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;
use InvalidArgumentException;

trait HasSoftDeletesFilters
{
    /**
     * @description Apply withTrashed filter safely.
     *
     * @param  bool  $strict  If true, throws an exception when the model doesn't use SoftDeletes.
     */
    public function withTrashed(bool $strict = true): static
    {
        if (! $this->modelUsesSoftDeletes()) {
            if ($strict) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Model [%s] does not use SoftDeletes trait.',
                        $this->builder->getModel()->getMorphClass()
                    )
                );
            }

            return $this;
        }

        $this->builder->withTrashed();

        return $this;
    }

    /**
     * @description Apply onlyTrashed filter safely.
     *
     * @param  bool  $strict  If true, throws an exception when the model doesn't use SoftDeletes.
     */
    public function onlyTrashed(bool $strict = true): static
    {
        if (! $this->modelUsesSoftDeletes()) {
            if ($strict) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Model [%s] does not use SoftDeletes trait.',
                        $this->builder->getModel()->getMorphClass()
                    )
                );
            }

            return $this;
        }

        $this->builder->onlyTrashed();

        return $this;
    }

    /**
     * @description Check if the model uses SoftDeletes trait.
     */
    protected function modelUsesSoftDeletes(): bool
    {
        $model = $this->builder->getModel();

        return in_array(
            SoftDeletes::class,
            class_uses_recursive($model)
        );
    }
}
