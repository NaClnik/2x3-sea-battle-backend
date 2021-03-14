<?php


namespace App\Http\Controllers;


use App\Services\Test\TestService;

class TestController
{
    // Сервисы.
    private TestService $testService;

    public function __construct(
        TestService $testService
    )
    {
        $this->testService = $testService;
    } // __construct.

    public function index($id, $okay): string {
        return 'TestController index '.$id.$okay.$this->testService->test();
    } // index.
} // TestController.