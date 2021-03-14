<?php


namespace Core\Reflection;

// TODO: Подумать над переименованием класса.
use Core\Models\Route;
use Core\Routing\RouteParser;
use ReflectionClass;
use ReflectionMethod;

class ReflectionHandler
{
    // TODO: Сделать обработку исключений.
    // TODO: Сделать декомпозицию метода.
    public function getDataFromController(string $controllerName, string $actionName)
    {
        // Получаем класс для рефлексии.
        $reflectionController = new ReflectionClass($controllerName);

        $controller = $this->getClassInstanceWithDependencies($controllerName);

        $reflectionAction = $reflectionController->getMethod($actionName);

        return $reflectionAction->invoke($controller);
    } // getDataFromController.

    // TODO: Подумать над переименованием метода.
    public function getArgumentsForMethodFromRoute(ReflectionMethod $reflectionMethod, Route $route, array $patterns): array
    {
//        $routeParser = new RouteParser($route->getRoute());
//
//        $routeParser->parse();

        return [];
    } // getArgumentsForMethodFromRoute.

    // Рекурсивный метод для Dependency Injection в контроллерах.
    // TODO: Обработать исключения.
    public function getClassInstanceWithDependencies(string $className)
    {
        // Получение класса по имени для рефлексии.
        $reflectionClass = new ReflectionClass($className);

        // Получение конструктора класса для рефлексии.
        $reflectionConstructor = $reflectionClass->getConstructor();

        if(!$reflectionConstructor){
            return $reflectionClass->newInstance();
        } // if.

        // Получение парааметров конструктора для рефлексии.
        $reflectionParameters = $reflectionConstructor->getParameters();

        // Если параметров нет, то возвращаем экземпляр класса.
        if(empty($reflectionParameters)){
            return $reflectionClass->newInstance();
        } // if.

        // Массив для передачи в конструктор класса аргументов.
        $createdClassArguments = [];

        // Цикл для хождения по параметрам конструктора.
        foreach ($reflectionParameters as $item){
            // Получаем имя класса параметра конструктора.
            $parameterClassName = $item->getClass()->getName();

            // Рекурсивный вызов.
            $arg = $this->getClassInstanceWithDependencies($parameterClassName);

            // Добавляем полученный аргумент в массив аргументов.
            array_push($createdClassArguments, $arg);
        } // foreach.

        // Возвращаем экземпляр класса со всеми его зависимостями.
        return $reflectionClass->newInstanceArgs($createdClassArguments);
    } // getClassInstanceWithDependencies.
} // ReflectionHandler.