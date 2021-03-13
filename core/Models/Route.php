<?php


namespace Core\Models;

// Класс, описывающий маршрут.
class Route
{
    // Поля класса.
    private string $method;
    private string $controllerName;
    private string $actionName;

    // Конструктор.
    public function __construct(string $method, string $controllerName, string $actionName)
    {
        $this->method = $method;
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    } // __construct.


} // Route.