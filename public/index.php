<?php

require_once '../vendor/autoload.php';

use Core\Bootstrap\WebApplication;
use Core\Bootstrap\WebApplicationBuilder;
use Core\Routing\Router;
use Core\Routing\RoutesCollection;


// Сразу делаю в паттерне FluentBuilder, т.к. возможно нужно будет
// добавить в приложение какую-то конфигурацию, а в этом паттерне работать удобно.

// Для наглядности вот:
// $webApplicationBuilder
//           ->setProxy(...)
//           ->setMode(...)
//           ->build()

// Создаём строителя приложения.
$webApplicationBuilder = new WebApplicationBuilder();

// Получаем сконфигурированный экземпляр приложения.
$webApplication = $webApplicationBuilder->build();

// Запускаем приложение.
$webApplication->run();


