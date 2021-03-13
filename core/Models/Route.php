<?php


namespace Core\Models;


class Route
{
    // Поля класса.
    protected string $route;
    protected string $method;

    // Конструктор.
    public function __construct(string $route, string $method)
    {
        $this->route = $route;
        $this->method = $method;
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
    #endregion
} // Route.