<?php


namespace Core\Base\Interfaces;


interface ICollection
{
    public function push($value);

    public function getValueByKey($key);
} // ICollection.