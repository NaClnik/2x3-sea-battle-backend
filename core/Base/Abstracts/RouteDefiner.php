<?php


namespace Core\Base\Abstracts;


use Core\Routing\RoutesCollection;

abstract class RouteDefiner
{
    protected RoutesCollection $routesCollection;

    public function __construct()
    {
        $this->routesCollection = new RoutesCollection();
    } // __construct.

    abstract public function getRoutes();
} // RouteDefiner.