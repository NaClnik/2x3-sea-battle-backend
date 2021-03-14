<?php


namespace Core\Routing;




// Строитель для Router (Паттерн FluentBuilder).
use Core\Base\Abstracts\RouteDefiner;
use Core\Base\Interfaces\IUriMatchValidator;

class RouterBuilder
{
    // Поля класса.
    private Router $router;

    // Конструктор.
    public function __construct()
    {
        $this->router = new Router();
    } // __construct.

    public function setRoutesCollection(RouteDefiner $routeDefiner): RouterBuilder
    {
        $this->router->setRoutesCollection($routeDefiner->getRoutes());
        return $this;
    } // setRoutesCollection.

    public function setUriMatchValidator(IUriMatchValidator $uriMatchValidator): RouterBuilder
    {
        $this->router->setUriMatchValidator($uriMatchValidator);
        return $this;
    } // setUriMatchValidator.

    public function build(): Router
    {
        return $this->router;
    } // build.
} // RouterBuilder.