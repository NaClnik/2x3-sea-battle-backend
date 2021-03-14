<?php


namespace Core\Reflection;


use ReflectionFunction;

class ExceptionsReflectionHandler
{
    // TODO: Сделать обработку исключений, если в методе больше одного параметра.
    // Методы класса.
    public function getTypeExceptionFromMethod($method)
    {
        $reflectionMethod = new ReflectionFunction($method);

        return $reflectionMethod->getParameters()[0]->getClass()->getName();
    } // getTypeExceptionFromMethod.
} // ExceptionsReflectionHandler.