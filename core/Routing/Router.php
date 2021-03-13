<?php

namespace Core\Routing;

use Core\Models\Route;
use Core\Reflection\ReflectionHandler;

class Router
{
    // Поля класса.
    public string $requestUri;
    public RoutesCollection $routesCollection;

    // Конструктор.
    public function __construct(RoutesCollection $routesCollection)
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->routesCollection = $routesCollection;
    } // __construct.

    // Методы класса.
    // TODO: Подумать над декомпозицией этого метода.
    public function executeRoute()
    {
        $routesCollection = $this->routesCollection->getRoutes();

        // TODO: Сделать регулярку для точного сопоставления маршрута.
        // На данный момент если ввести в адресной строке маршрут:
        //            !! OK !!
        // Адресная строка:   /test/index
        // Определён маршрут: /test/index
        //
        //            !! NO !!
        // Адресная строка:   /test/index/
        // Определён маршрут: /test/index
        $route = array_filter($routesCollection, function (Route $route){
            return $route->getRoute() == $this->requestUri;
        })[0]; // array_filter.

        $reflectionHandler = new ReflectionHandler();

        //$reflectionHandler->getDataFromController($route);
    } // executeRoute.
} // Router.