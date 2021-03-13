<?php


namespace Core\Bootstrap;


use App\Routes\ApiRouteDefiner;
use Core\Abstracts\RouteDefiner;
use Core\Routing\Router;
use Core\Routing\RoutesCollection;

class WebApplication
{
    // Методы класса.
    public function run(): void{
        $routeDefiner = new ApiRouteDefiner();

        $router = new Router($routeDefiner->getRoutes());

        $router->executeRoute();
    } // run.
} // WebApplication.