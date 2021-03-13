<?php


namespace Core\Bootstrap;


class WebApplication
{
    // Методы класса.
    public function run(): void{
        echo $_SERVER['REQUEST_URI'];
    } // run.
} // WebApplication.