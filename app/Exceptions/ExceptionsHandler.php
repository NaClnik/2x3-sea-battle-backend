<?php


namespace App\Exceptions;


use Core\Base\Abstracts\CoreExceptionsHandler;
use Core\Exceptions\RouteNotFoundException;

class ExceptionsHandler extends CoreExceptionsHandler
{
    // Методы класса.
    public function register(): void
    {
        $this->registerException(function (RouteNotFoundException $exception){
            echo 'RouteNotFoundException. Исключение сработало!';
        }); // RouteNotFoundException.
    } // register.
} // ExceptionsHandler.