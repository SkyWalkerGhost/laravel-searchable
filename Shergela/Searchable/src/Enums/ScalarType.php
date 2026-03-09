<?php

declare(strict_types=1);

namespace Shergela\Searchable\Enums;

enum ScalarType: string
{
    case Int = 'int';
    case Float = 'float';
    case String = 'string';
    case Bool = 'bool';
    case Date = 'date';
}
