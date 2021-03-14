<?php


namespace Core\Routing;


// Класс для парсинга URI.
class RouteParser
{
    public function parse(string $uri): array {
        $temp = explode('/', $uri);

        $temp = array_filter($temp, fn (string $item) => $item != "");

        return array_values($temp);
    } // parse.

    public function getValuesFromPattern(string $uri, string $pattern): array {
        $segments = $this->parse($uri);

        $values = [];

        foreach ($segments as $segment){
            if(preg_match($pattern, $segment)){
                array_push($values, $segment);
            } // if.
        } // foreach.

        return $values;
    } // getValuesFromPatterns.
} // RouteParser.