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

    public function getValuesFromPattern(string $requestUri, string $definedUri, string $pattern): array {
        $requestUriSegments = $this->parse($requestUri);
        $definedUriSegments = $this->parse($definedUri);

        $values = [];

        $countSegments = count($requestUriSegments);

        for ($i = 0; $i < $countSegments; $i++){
            $currentRequestUriSegment = $requestUriSegments[$i];
            $currentDefinedUriSegment = $definedUriSegments[$i];

            if(preg_match($pattern, $currentDefinedUriSegment)){
                array_push($values, $currentRequestUriSegment);
            } // if.
        } // for.

        return $values;
    } // getValuesFromPatterns.
} // RouteParser.