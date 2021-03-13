<?php


namespace Core\Bootstrap;

// Класс для создания WebApplication в паттерне FluentBuilder.
class WebApplicationBuilder
{
    // Поля класса.
    private WebApplication $webApplication;

    // Конструктор.
    public function __construct()
    {
        $this->webApplication = new WebApplication();
    } // __construct.

    public function build(): WebApplication {
        return $this->webApplication;
    } // build.
} // WebApplicationBuilder.