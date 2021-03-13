<?php


namespace Core\Bootstrap;


use Core\Routing\Router;
use Core\Routing\RoutesCollection;

class WebApplication
{
    // Методы класса.
    public function run(): void{
        $router = new Router(new RoutesCollection());
    } // run.
} // WebApplication.