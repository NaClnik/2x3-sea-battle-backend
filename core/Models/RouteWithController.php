<?php


namespace Core\Models;

// Класс, описывающий маршрут.
class RouteWithController extends Route
{
    // Поля класса.
    private string $controllerName;
    private string $actionName;

    // Конструктор.
    public function __construct(string $route, string $method, string $controllerName, string $actionName)
    {
        parent::__construct($route, $method);
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.
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
} // RouteWithController.
