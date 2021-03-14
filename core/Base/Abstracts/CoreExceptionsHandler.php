<?php


namespace Core\Base\Abstracts;



use Core\Collections\ExceptionHandlersCollection;
use Core\Exceptions\RouteNotFoundException;
use Core\Models\ExceptionHandlerValuePair;
use Core\Reflection\ExceptionsReflectionHandler;
use Exception;

// Базовый класс для обработки исключений в приложении.
abstract class CoreExceptionsHandler
{
    // Поля класса.
    protected ExceptionHandlersCollection $exceptionHandlersCollection;

    // Конструктор.
    public function __construct()
    {
        $this->exceptionHandlersCollection = new ExceptionHandlersCollection();
        $this->register();
    } // __construct.

    // Методы класса.
    public function handle(string $className, Exception $exception): void
    {
        $callback = $this->exceptionHandlersCollection->getValueByKey($className);

        $callback->__invoke($exception);
    } // handle.

    public function registerException($callback): void
    {
        $exceptionsReflectionHandler = new ExceptionsReflectionHandler();

        $typeException = $exceptionsReflectionHandler->getTypeExceptionFromMethod($callback);

        $valuePair = new ExceptionHandlerValuePair($typeException, $callback);

        $this->exceptionHandlersCollection->push($valuePair);
    } // registerException.

    // Абстрактные методы класса.
    public abstract function register(): void;
} // CoreExceptionsHandler.