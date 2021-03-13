<?php


namespace App\Routes;


use App\Http\Controllers\TestController;
use Core\Abstracts\RouteDefiner;
use Core\Routing\RoutesCollection;

// Класс, где нужно определять маршруты.
class ApiRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->get('/test/index', TestController::class, 'index');

        return $this->routesCollection;
    } // getRoutes.
} // ApiRouteDefiner.