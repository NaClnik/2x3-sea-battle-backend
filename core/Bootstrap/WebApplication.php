<?php


namespace Core\Bootstrap;


use App\Exceptions\ExceptionsHandler;
use App\Routes\ApiRouteDefiner;
use Core\Defaults\DefaultUriMatchValidator;
use Core\Exceptions\RouteNotFoundException;
use Core\Routing\RouterBuilder;
use Exception;

class WebApplication
{
    // Методы класса.
    public function run(): void{
        $routerBuilder = new RouterBuilder();

        $router = $routerBuilder
            ->setRoutesCollection(new ApiRouteDefiner())
            ->setUriMatchValidator(new DefaultUriMatchValidator())
            ->build();

        try {
            echo $router->executeRoute();
        } catch (Exception $exception) {
            $exceptionHandler = new ExceptionsHandler();

            $exceptionHandler->handle(get_class($exception), $exception);
        } // catch.
    } // run.
} // WebApplication.