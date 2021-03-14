<?php


namespace Core\Base\Abstracts;


// Базовый класс для обработки исключений в приложении.

use Exception;

abstract class CoreExceptionsHandler
{
    // Методы класса.
    public function handle(string $className, Exception $exception)
    {

    } // handle.
} // CoreExceptionsHandler.