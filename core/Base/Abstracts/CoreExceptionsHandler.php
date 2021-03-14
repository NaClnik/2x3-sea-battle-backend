<?php


namespace Core\Base\Abstracts;



use Core\Collections\ExceptionHandlersCollection;
use Core\Models\ExceptionHandlerValuePair;
use Core\Reflection\ExceptionsReflectionHandler;
use Exception;

// Базовый класс для обработки исключений в приложении.
abstract class CoreExceptionsHandler
{
    // Поля класса.
    private ExceptionHandlersCollection $exceptionHandlersCollection;

    // Конструктор.
    public function __construct()
    {
        $this->exceptionHandlersCollection = new ExceptionHandlersCollection();
    } // __construct.

    // Методы класса.
    public function handle(string $className, Exception $exception): void
    {
        $callback = $this->exceptionHandlersCollection->getValueByKey($className);

        $callback($exception);
    } // handle.

    public function registerException($callback): void
    {
        $exceptionsReflectionHandler = new ExceptionsReflectionHandler();

        $typeException = $exceptionsReflectionHandler->getTypeExceptionFromMethod($callback);

        $this->exceptionHandlersCollection->push(new ExceptionHandlerValuePair($typeException, $callback));
    } // registerException.

    // Абстрактные методы класса.
    public abstract function register(): void;
} // CoreExceptionsHandler.