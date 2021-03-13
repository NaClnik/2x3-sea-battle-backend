<?php


namespace Core\Routing;


// Класс для определения маршрутов приложения.
use Core\Models\Route;

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
        array_push($this->routes, new Route($route, 'get', $controllerName, $actionName));
    } // get.

    public function post(string $route, string $controllerName, string $actionName)
    {
        array_push($this->routes, new Route($route, 'post', $controllerName, $actionName));
    } // get.
} // RoutesCollection.