<?php

declare(strict_types=1);

namespace Shergela\Searchable\Traits;

use App\Utils\RequestInput;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use InvalidArgumentException;
use Shergela\Searchable\Enums\ScalarType;

trait HasValidateInputs
{
    protected function validateInputs(
        string $field,
        Request $request,
        ScalarType $scalarType = ScalarType::String
    ): Carbon|int|float|string|null {
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
            default => null,
        };
    }
}
