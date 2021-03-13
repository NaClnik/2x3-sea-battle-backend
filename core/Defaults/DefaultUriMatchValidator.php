<?php

namespace Core\Defaults;

use Core\Interfaces\IUriMatchValidator;
use Core\Models\Route;

class DefaultUriMatchValidator implements IUriMatchValidator
{

    public function match(Route $requestRoute, Route $definedRoute): bool
    {
        return false;
    } // match.
}