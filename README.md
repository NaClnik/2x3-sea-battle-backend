# 2x3-sea-battle-backend

## Using
```
git clone
composer update
```

## Example define routes
Go to ```app/Routes/ApiRouteDefiner.php``` and define your routes in ```getRoutes()``` method:
```php
class ApiRouteDefiner extends RouteDefiner
{
    public function getRoutes(): RoutesCollection
    {
        $this->routesCollection->get('/test/verify', TestController::class, 'index');
        $this->routesCollection->get('/ok/index', TestController::class, 'index');

        return $this->routesCollection;
    } // getRoutes.
} // ApiRouteDefiner.
```
For now, you can define routes with methods ```GET``` and ```POST```.
You must pass the route name, controller name and action name as arguments.


You should definitely return ```$this->routesCollection;```

## Dependency Injection example
```php
class TestController
{
    // Services.
    private TestService $testService;

    public function __construct(
        TestService $testService
    )
    {
        $this->testService = $testService;
    } // __construct.

    public function index(): string {
        return $this->testService->test();
    } // index.
} // TestController.
```
And here everything is simple. You define the service you need as a parameter and the framework itself will implement this service for you
