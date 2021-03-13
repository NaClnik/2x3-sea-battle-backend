<?php


namespace Core\Reflection;

// TODO: Подумать над переименованием класса.
use ReflectionClass;

class ReflectionHandler
{
    // TODO: Сделать обработку исключения.
    public function getDataFromController(string $controllerName, string $actionName)
    {
        $reflectionController = new ReflectionClass($controllerName);

        var_dump($reflectionController->getMethods());
    } // getDataFromController.
} // ReflectionHandler.