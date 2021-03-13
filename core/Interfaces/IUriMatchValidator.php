<?php


namespace Core\Interfaces;


use Core\Models\Route;

interface IUriMatchValidator
{
    public function match(Route $requestRoute, Route $definedRoute): bool;
}