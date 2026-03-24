<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use Illuminate\Support\Carbon;
use InvalidArgumentException;
use Shergela\Searchable\Enums\ScalarType;
use Shergela\Searchable\Requests\RequestInput;

trait HasValidateInputs
{
    protected function validateInputs(
        string $field,
        ScalarType $scalarType
    ): Carbon|int|float|string|bool|null {
        $request = $this->request();
        $keys = $request->keys();

        if (empty($keys)) {
            return null;
        }

        if (! in_array($field, $keys) && ! $this->shouldIgnoreMissingFields()) {
            throw new InvalidArgumentException(
                message: sprintf(
                    'The field ["%s"] is not in the request keys: [%s]',
                    $field,
                    implode(', ', $keys)
                )
            );
        }

        /**
         * If the field is not in the request, return null.
         */
        if (! $request->filled($field)) {
            return null;
        }

        return match ($scalarType) {
            ScalarType::Int => $request->filled($field) ? $request->integer($field) : null,
            ScalarType::Float => $request->filled($field) ? $request->float($field) : null,
            ScalarType::String => $request->filled($field) ? $request->string($field)->value() : null,
            ScalarType::Bool => $request->filled($field) ? $request->boolean($field) : null,
            ScalarType::Date => RequestInput::dateOrNull($request->date($field)),
        };
    }
}
