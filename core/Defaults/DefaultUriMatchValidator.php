<?php

namespace Core\Defaults;

use Core\Base\Interfaces\IUriMatchValidator;
use Core\Models\Route;
use Core\Routing\RouteParser;

class DefaultUriMatchValidator implements IUriMatchValidator
{

    // TODO: Подумать над декомпозицией этого метода.
    public function match(Route $requestRoute, Route $definedRoute): bool
    {
        // Создаём экземпляр парсера.
        $routeParser = new RouteParser();

        // Парсим роуты.
        $requestRouteSegments = $routeParser->parse($requestRoute->getRoute());
        $definedRouteSegments = $routeParser->parse($definedRoute->getRoute());

        // Если количество сегментов не совпадает, то возвращаем false.
        if(count($requestRouteSegments) != count($definedRouteSegments)){
            return false;
        } // if.

        // Флаг, совпадают ли маршруты.
        $isMatch = true;

        // Получаем общее количество сегментов.
        $totalCountSegments = count($requestRouteSegments);

        // В цикле сравниваем сегменты.
        for($i = 0; $i < $totalCountSegments; $i++){
            // Получение текущих сегментов и приведение их к нижнему регистру
            // для сравнивания.
            $currentRequestRouteSegment = strtolower($requestRouteSegments[$i]);
            $currentDefinedRouteSegment = strtolower($definedRouteSegments[$i]);

            // Если сегменты не совпадают и $currentDefinedRouteSegment
            // не соответствует строке {text}, то ставим флаг в false.
            if($currentRequestRouteSegment != $currentDefinedRouteSegment
            || !preg_match('/{[^\/]+}/', $currentDefinedRouteSegment)){
                $match = false;
            } // if.
        } // for.

        return $isMatch;
    } // match.
}