<?php


namespace Core\Routing;


// Класс для определения маршрутов приложения.
use Core\Models\RouteWithController;

class RoutesCollection
{
    // Поля класса.
    private array $routes;

    // Конструктор.
    public function __construct()
    {
        $this->routes = [];
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
        array_push($this->routes, new RouteWithController($route, 'GET', $controllerName, $actionName));
    } // get.

    public function post(string $route, string $controllerName, string $actionName)
    {
        array_push($this->routes, new RouteWithController($route, 'POST', $controllerName, $actionName));
    } // get.
} // RoutesCollection.