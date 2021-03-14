<?php


namespace Core\Base\Interfaces;


use Core\Models\Route;

interface IUriMatchValidator
{
    public function match(Route $requestRoute, Route $definedRoute): bool;
}