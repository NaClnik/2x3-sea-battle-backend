<?php

namespace Core\Routing;

use Core\Defaults\DefaultUriMatchValidator;
use Core\Interfaces\IUriMatchValidator;
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
     * @return mixed|string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @param mixed|string $requestUri
     */
    public function setRequestUri($requestUri): void
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @return mixed|string
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * @param mixed|string $requestMethod
     */
    public function setRequestMethod($requestMethod): void
    {
        $this->requestMethod = $requestMethod;
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
    // TODO: Подумать над декомпозицией этого метода.
    public function executeRoute()
    {
        $routesCollection = $this->routesCollection->getRoutes();

        // TODO: Сделать регулярку для точного сопоставления маршрута.
        // На данный момент если ввести в адресной строке маршрут:
        //            !! OK !!
        // Адресная строка:   /test/index
        // Определён маршрут: /test/index
        //
        //            !! NO !!
        // Адресная строка:   /test/index/
        // Определён маршрут: /test/index
        $route = array_filter($routesCollection, function (RouteWithController $route){
            //return $route->getRoute() == $this->requestUri;
//            return $route->getRoute() == $this->requestUri && $route->getMethod() == $this->requestMethod;
        })[0]; // array_filter.

        $reflectionHandler = new ReflectionHandler();

        return $reflectionHandler->getDataFromController($route->getControllerName(), $route->getActionName());
    } // executeRoute.

    private function getMatchedRoute()
    {
        $routesCollection = $this->routesCollection->getRoutes();

        $route = array_filter($routesCollection, function (RouteWithController $route){
            //$this->uriMatchValidator->match()
            // return $route->getRoute() == $this->requestUri;
        })[0]; // array_filter.
    } // getMatchedRoute.
} // Router.