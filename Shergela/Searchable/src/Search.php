<?php

declare(strict_types=1);

namespace Shergela\Searchable;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\ValidationException;
use LogicException;
use Shergela\Searchable\Contracts\Validatable;

class Search extends Searchable
{
    protected ?string $redirectUrl = null;

    protected function model(): Builder
    {
        throw new LogicException(
            message: 'Search::model() should not be called directly. Use Search::query(Builder $builder)'
        );
    }

    /**
     * @description Set a custom redirect URL or route name for validation failures.
     *
     * @param  string  $url  A valid route name or a direct URL string.
     * @return $this
     */
    public function redirectTo(string $url): self
    {
        $this->redirectUrl = Route::has($url) ? route($url) : $url;

        return $this;
    }

    /** @description Validate incoming request data against the model's validation rules.
     * @return $this
     */
    public function validate(
        array $rules = [],
        array $messages = [],
        array $attributes = []
    ): self {
        $finalRules = $this->resolveRules(rules: $rules);

        $this->validateRuleStructures(finalRules: $finalRules);

        $this->executeValidation(rules: $finalRules, messages: $messages, attributes: $attributes);

        return $this;
    }

    /**
     * @description Resolves and merges validation rules for a given model.
     * @description This method retrieves validation rules defined in the associated model and merges them
     * @description with the provided additional rules, if any. If the model does not implement the
     * @description Validatable interface or no rules are defined, it throws a LogicException.
     *
     * @param  array|null  $rules  Optional additional rules to merge with model-defined rules.
     * @return array The merged set of validation rules.
     *
     * @throws LogicException If the model does not implement the Validatable interface or
     *                        if no validation rules are defined.
     */
    private function resolveRules(?array $rules): array
    {
        $model = $this->builder->getModel();

        if (! $model instanceof Validatable) {
            throw new LogicException(
                sprintf('Model [%s] must implement Validatable interface.', get_class($model))
            );
        }

        $modelRules = $model->rules();
        $finalRules = $rules ? array_merge($modelRules, $rules) : $modelRules;

        if (empty($finalRules)) {
            throw new LogicException(
                'Validation rules are missing. Define them in the model or pass to validate().'
            );
        }

        return $finalRules;
    }

    /**
     * @description Validates the structure of the provided validation rules for a given request.
     * @description This method ensures that each field's validation rules are properly formatted as an array
     * @description and not as a string using pipe syntax. Additionally, for GET requests, it enforces that
     * @description each field includes the 'nullable' rule to prevent infinite redirection issues.
     *
     * @param  array  $finalRules  The validation rules to validate, structured as an associative
     *                             array where the keys are field names and the values are arrays
     *                             of rules.
     *
     * @throws LogicException If a field's validation rules are not provided as an array or if
     *                        a field for a GET request does not include the 'nullable' rule.
     */
    private function validateRuleStructures(array $finalRules): void
    {
        $isGet = request()->isMethod('GET');

        foreach ($finalRules as $field => $rules) {
            // 1. Validation rules must be provided as an array
            if (! is_array($rules)) {
                throw new LogicException(sprintf(
                    "Invalid syntax for field [%s]:
                    Use array syntax ['rule1', 'rule2'] instead of pipe (%s) strings.",
                    $field,
                    '|'
                ));
            }

            if (! $isGet) {
                continue;
            }

            // 2. Validated fields for GET requests must include the 'nullable' rule
            if (! in_array('nullable', $rules, true)) {
                throw new LogicException(sprintf(
                    "Infinite redirect protection: Field [%s] must include 'nullable' for GET requests.",
                    $field
                ));
            }

            // 3. Validated fields for GET requests cannot include the 'required' rule
            if (in_array('required', $rules, true)) {
                throw new LogicException(sprintf(
                    "Conflict detected: Field [%s] cannot be 'required' during a GET request.
                    Use 'nullable' instead.",
                    $field
                ));
            }
        }
    }

    /**
     * @description Executes the validation process for incoming request data.
     * @description This method validates the incoming request data against the provided rules, messages,
     * @description and custom attributes. If validation fails, it throws an exception based on the
     * @description request type, either in JSON format for API responses or as a standard validation exception.
     *
     * @param  array  $rules  Validation rules to apply to the incoming request data.
     * @param  array  $messages  Custom error messages for validation failures.
     * @param  array  $attributes  Custom attribute names for validation error messages.
     *
     * @throws HttpResponseException If validation fails and the request expects a JSON response.
     * @throws ValidationException If validation fails and the request does not expect a JSON response.
     */
    /**
     * @description Executes the validation process.
     */
    private function executeValidation(array $rules, array $messages, array $attributes): void
    {
        $validator = ValidatorFacade::make(
            data: request()->all(),
            rules: $rules,
            messages: $messages,
            attributes: $attributes
        );

        if ($validator->fails()) {
            $this->handleValidationFailure($validator);
        }
    }

    /**
     * @description Handles what happens when validation fails.
     */
    private function handleValidationFailure(ValidatorContract $validator): void
    {
        if (request()->expectsJson()) {
            throw new HttpResponseException(
                response()->json(['errors' => $validator->errors()], 422)
            );
        }

        $exception = new ValidationException($validator);

        if ($this->getRedirectUrl()) {
            $exception->redirectTo($this->getRedirectUrl());
        }

        throw $exception;
    }

    private function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }
}
