<?php


namespace Core\Collections;


use Core\Base\Interfaces\ICollection;

class ExceptionHandlersCollection implements ICollection
{
    // Поля класса.
    private array $collection;

    // TODO: Добавить в конструктор параметр для дефолтных аргументов.
    // Конструктор.
    public function __construct()
    {
        $this->collection = [];
    } // __construct.

    // TODO: Т.к. в PHP нет обобщений, нужно сделать проверку передаваемого типа.
    // Методы класса.
    public function push($value): ExceptionHandlersCollection
    {
        array_push($this->collection, $value);

        return $this;
    } // push.

    // TODO: Обработать ситуацию, если ключ не найден.
    public function getValueByKey($key)
    {
        $value = null;

        foreach ($this->collection as $item){
            if($item->getType() == $key){
                $value = $item->getHandler();
                break;
            } // if.
        } // foreach.

        return $value;
    } // getValueByKey.
} // ExceptionHandlersCollection.