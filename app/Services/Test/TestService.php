<?php


namespace App\Services\Test;



use App\Services\Test\Repositories\TestRepository;

class TestService
{
    // Репозитории.
    public TestRepository $testRepository;

    public function __construct(
        TestRepository $testRepository
    )
    {
        $this->testRepository = $testRepository;
    }

    public function test()
    {
        return 'TestService test'.$this->testRepository->test();
    } // test.
} // Test.