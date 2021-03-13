<?php

namespace Core\Defaults;

use Core\Interfaces\IUriMatchValidator;
use Core\Models\Route;

class DefaultUriMatchValidator implements IUriMatchValidator
{

    public function match(Route $requestRoute, Route $definedRoute): bool
    {
        // Паттерн, который находит слэш в начале и в конце строки.
        $pattern = '/^\W+|\W$/';

        // Удаляем слэш в начале и в конце роута.
        $requestRouteWithoutSlash = preg_replace($pattern, '', $requestRoute->getRoute());
        $definedRouteWithoutSlash = preg_replace($pattern, '', $definedRoute->getRoute());

        // Сравниваем маршруты.
        $methodsMatched = strtolower($requestRoute->getMethod()) == strtolower($definedRoute->getMethod());
        $routesMatched = strtolower($requestRouteWithoutSlash) == strtolower($definedRouteWithoutSlash);

        return $methodsMatched && $routesMatched;
    } // match.
}