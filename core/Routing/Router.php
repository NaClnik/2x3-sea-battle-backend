<?php

namespace Core\Routing;

use Core\Base\Interfaces\IUriMatchValidator;
use Core\Defaults\DefaultUriMatchValidator;
use Core\Exceptions\RouteNotFoundException;
use Core\Models\Route;
use Core\Models\RouteWithController;
use Core\Reflection\ReflectionHandler;

class Router
{
    // Поля класса.
    private Route $requestRoute;
    private RoutesCollection $routesCollection;
    private IUriMatchValidator $uriMatchValidator;

    // Конструктор.
    public function __construct()
    {
        $this->requestRoute = new Route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        $this->routesCollection = new RoutesCollection();
        $this->uriMatchValidator = new DefaultUriMatchValidator();
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.
    /**
     * @return Route
     */
    public function getRequestRoute(): Route
    {
        return $this->requestRoute;
    }

    /**
     * @param Route $requestRoute
     */
    public function setRequestRoute(Route $requestRoute): void
    {
        $this->requestRoute = $requestRoute;
    }

    /**
     * @return RoutesCollection
     */
    public function getRoutesCollection(): RoutesCollection
    {
        return $this->routesCollection;
    }

    /**
     * @param RoutesCollection $routesCollection
     */
    public function setRoutesCollection(RoutesCollection $routesCollection): void
    {
        $this->routesCollection = $routesCollection;
    }

    /**
     * @return IUriMatchValidator
     */
    public function getUriMatchValidator(): IUriMatchValidator
    {
        return $this->uriMatchValidator;
    }

    /**
     * @param IUriMatchValidator $uriMatchValidator
     */
    public function setUriMatchValidator(IUriMatchValidator $uriMatchValidator): void
    {
        $this->uriMatchValidator = $uriMatchValidator;
    }
    #endregion

    // Методы класса.
    // Метод для исполнения метода контроллера, к которому привязан маршрут.
    public function executeRoute()
    {
        // Получить совпадающий маршрут.
        $matchedRoute = $this->getMatchedRoute();

        // Создать хэндлер для рефлексии.
        $reflectionHandler = new ReflectionHandler();

        // Получить данные из метода контроллера, связанного с маршрутом.
        return $reflectionHandler->getDataFromController(
            $matchedRoute->getControllerName(), $matchedRoute->getActionName(),
            $this->requestRoute->getRoute(), $matchedRoute->getRoute()
        );
    } // executeRoute.

    // Получить маршрут, который совпадает с определённым маршрутом в ApiRouteDefiner.
    private function getMatchedRoute(): RouteWithController
    {
        // Получить все роуты, определённые в ApiRouteDefiner.
        $routesCollection = $this->routesCollection->getRoutes();

        // Получить массив с совпадающими маршрутами.
        $data = array_filter($routesCollection, function (Route $route){
            return $this->uriMatchValidator->match($this->requestRoute, $route);
        });

        $foundRoute = array_values($data)[0];

        if (!array_values($data)[0]){
            throw new RouteNotFoundException();
        } // if.

        // Вернуть первый элемент из массива.
        return array_values($data)[0];
    } // getMatchedRoute.
} // Router.