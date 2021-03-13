<?php

namespace Core\Routing;

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
    public function executeRoute()
    {
        $routes = $this->routesCollection->getRoutes();
        array_filter($routes, function (){

        });
    } // executeRoute.
} // Router.