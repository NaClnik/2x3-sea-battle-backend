<?php


namespace Core\Routing;


// Класс для парсинга URI.
class RouteParser
{
    // Поля класса.
    private string $uri;

    // Конструктор.
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    } // __construct.

    public function parse(): array {
        $temp = explode('/', $this->uri);

        $temp = array_filter($temp, fn (string $item) => $item != "");

        return array_values($temp);
    } // parse.
} // RouteParser.