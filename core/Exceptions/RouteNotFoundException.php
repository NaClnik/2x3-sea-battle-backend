<?php


namespace Core\Exceptions;


// Если маршрут не найдет, тогда следует выбрасывать это исключение.
use Exception;
use Throwable;

// TODO: По возможности добавить сюда функционал.
class RouteNotFoundException extends Exception
{

} // RouteNotFoundException.