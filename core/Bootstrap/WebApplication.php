<?php


namespace Core\Bootstrap;


use App\Routes\ApiRouteDefiner;
use Core\Defaults\DefaultUriMatchValidator;
use Core\Routing\RouterBuilder;

class WebApplication
{
    // Методы класса.
    public function run(): void{
        $routerBuilder = new RouterBuilder();

        $router = $routerBuilder
            ->setRoutesCollection(new ApiRouteDefiner())
            ->setUriMatchValidator(new DefaultUriMatchValidator())
            ->build();

        echo $router->executeRoute();
    } // run.
} // WebApplication.