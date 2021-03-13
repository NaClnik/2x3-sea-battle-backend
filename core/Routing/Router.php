<?php

namespace Core\Routing;

class Router
{
    // Поля класса.
    public string $requestUrl;
    public RoutesCollection $routesCollection;

    public function __construct()
    {
        echo 'router';
    } // __construct.
} // Router.