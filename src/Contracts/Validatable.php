<?php

declare(strict_types=1);

namespace Shergela\Searchable\Contracts;

interface Validatable
{
    /**
     * @description Define the validation rules for the application.
     *
     * @return array An array containing validation rules.
     */
    public function rules(): array;
}
