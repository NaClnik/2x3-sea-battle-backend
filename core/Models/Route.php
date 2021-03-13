<?php


namespace Core\Models;

// Класс, описывающий маршрут.
class Route
{
    // Поля класса.
    private string $route;
    private string $method;
    private string $controllerName;
    private string $actionName;

    // Конструктор.
    public function __construct(string $route, string $method, string $controllerName, string $actionName)
    {
        $this->route = $route;
        $this->method = $method;
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @param string $controllerName
     */
    public function setControllerName(string $controllerName): void
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @param string $actionName
     */
    public function setActionName(string $actionName): void
    {
        $this->actionName = $actionName;
    } // __construct.
    #endregion
} // Route.
