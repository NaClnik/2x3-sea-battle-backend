<?php


namespace App\Routes;


use App\Http\Controllers\TestController;
use Core\Abstracts\RouteDefiner;
use Core\Interfaces\IRouteDefiner;
use Core\Routing\RoutesCollection;

class ApiRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->get('/test/index', TestController::class, 'index');

        return $this->routesCollection;
    } // getRoutes.
} // ApiRouteDefiner.