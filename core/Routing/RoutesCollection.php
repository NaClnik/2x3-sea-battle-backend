<?php


namespace Core\Routing;


// Класс для определения маршрутов приложения.
class RoutesCollection
{
    // Поля класса.
    private array $routes;

    // Конструктор.
    public function __construct()
    {
        echo 'routes_collection';
        $routes = [];
    } // __construct.

    // Аксессоры класса.
    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    } // getRoutes.

    // Методы класса
    // TODO: Сократить код.
    public function get(string $route, string $controllerName, string $actionName)
    {
        array_push($this->routes, [
            'method' => 'get',
            'controllerName' => $controllerName,
            'actionName' => $actionName
        ]); // array_push.
    } // get.

    public function post(string $route, string $controllerName, string $actionName)
    {
        array_push($this->routes, [
            'method' => 'post',
            'controllerName' => $controllerName,
            'actionName' => $actionName
        ]); // array_push.
    } // get.
} // RoutesCollection.