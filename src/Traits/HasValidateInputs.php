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

        return match ($scalarType) {
            ScalarType::Int => RequestInput::intOrNull($request->integer($field)),
            ScalarType::Float => RequestInput::floatOrNull($request->float($field)),
            ScalarType::String => RequestInput::stringOrNull($request->string($field)),
            ScalarType::Date => RequestInput::dateOrNull($request->date($field)),
            ScalarType::Bool => $request->has($field) ? $request->boolean($field) : null,
            default => null,
        };
    }
}
