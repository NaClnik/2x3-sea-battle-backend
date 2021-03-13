<?php


namespace Core\Interfaces;


use Core\Routing\RoutesCollection;

interface IRouteDefiner {
    public function getRoutes(): RoutesCollection;
} // IRouteDefiner.